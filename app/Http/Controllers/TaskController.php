<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'due_date' => 'required|date',
                'student_id' => 'required|exists:users,id',
                'task_type' => 'required|in:ders,deneme',
                'ders_type' => 'required_if:task_type,ders|string|max:255',
                'ders_konu' => 'required_if:task_type,ders|string|max:255',
                'deneme_type' => 'required_if:task_type,deneme|in:tekders,genel',
                'deneme_ders' => 'required_if:deneme_type,tekders|string|max:255',
                'deneme_sure' => 'required_if:task_type,deneme|integer|min:1',
            ]);

            $task = new Task();
            $task->title = $validated['title'];
            $task->description = $validated['description'];
            $task->due_date = $validated['due_date'];
            $task->student_id = $validated['student_id'];
            $task->coach_id = Auth::id();
            $task->task_type = $validated['task_type'];
            
            if ($validated['task_type'] === 'ders') {
                $task->ders_type = $validated['ders_type'];
                $task->ders_konu = $validated['ders_konu'];
            } else {
                $task->deneme_type = $validated['deneme_type'];
                $task->deneme_sure = $validated['deneme_sure'];
                if ($validated['deneme_type'] === 'tekders') {
                    $task->deneme_ders = $validated['deneme_ders'];
                }
            }

            $task->save();

            return response()->json([
                'success' => true,
                'message' => 'Görev başarıyla oluşturuldu.',
                'task' => $task
            ]);
        } catch (\Exception $e) {
            Log::error('Görev oluşturma hatası: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Görev oluşturulurken bir hata oluştu: ' . $e->getMessage()
            ], 500);
        }
    }

    public function assign(Request $request)
    {
        try {
            Log::info('Task assignment request received', $request->all());

            $validated = $request->validate([
                'student_id' => 'required|exists:users,id',
                'title' => 'required|string|max:255',
                'task_type' => 'required|in:ders,deneme',
                'ders_type' => 'required_if:task_type,ders|nullable',
                'ders_konu' => 'required_if:task_type,ders|nullable',
                'deneme_type' => 'required_if:task_type,deneme|nullable|in:tekders,genel',
                'deneme_ders' => 'required_if:deneme_type,tekders|nullable',
                'deneme_sure' => 'required_if:task_type,deneme|nullable|integer|min:1',
                'description' => 'required',
                'due_date' => 'required|date|after_or_equal:today',
            ], [
                'deneme_type.in' => 'Seçilen deneme tipi geçersiz.',
                'deneme_sure.integer' => 'Deneme süresi tam sayı olmalıdır.',
                'deneme_sure.min' => 'Deneme süresi en az 1 dakika olmalıdır.',
                'due_date.after_or_equal' => 'Son tarih bugün veya daha sonrası olmalıdır.'
            ]);

            Log::info('Validation passed', $validated);

            // Deneme süresi string olarak geliyorsa integer'a çevir
            if ($request->task_type === 'deneme' && $request->deneme_sure) {
                $request->merge(['deneme_sure' => (int)$request->deneme_sure]);
            }

            $task = Task::create([
                'student_id' => $request->student_id,
                'coach_id' => Auth::id(),
                'title' => $request->title,
                'task_type' => $request->task_type,
                'ders_type' => $request->ders_type,
                'ders_konu' => $request->ders_konu,
                'deneme_type' => $request->deneme_type,
                'deneme_ders' => $request->deneme_ders,
                'deneme_sure' => $request->deneme_sure,
                'description' => $request->description,
                'due_date' => $request->due_date
            ]);

            Log::info('Task created successfully', ['task_id' => $task->id]);

            return response()->json([
                'success' => true,
                'message' => 'Görev başarıyla atandı',
                'task' => $task
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error', ['errors' => $e->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validasyon hatası',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error assigning task', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Görev atanırken bir hata oluştu: ' . $e->getMessage()
            ], 500);
        }
    }

    public function toggle(Task $task)
    {
        if (Auth::user()->role === 'student') {
            // Öğrenci görevi tamamladığında
            $task->completed = true;
            $task->coach_approval = false; // Koç onayı bekliyor
            $task->save();

            return response()->json([
                'success' => true,
                'message' => 'Görev tamamlandı. Koç onayı bekleniyor.'
            ]);
        } else {
            // Koç görevi onayladığında
            $task->coach_approval = true;
            $task->save();

            return response()->json([
                'success' => true,
                'message' => 'Görev onaylandı.'
            ]);
        }
    }

    public function approveTask(Task $task)
    {
        if (Auth::user()->role !== 'coach') {
            return response()->json([
                'success' => false,
                'message' => 'Bu işlem için yetkiniz yok.'
            ], 403);
        }

        $task->coach_approval = true;
        $task->save();

        return response()->json([
            'success' => true,
            'message' => 'Görev başarıyla onaylandı.'
        ]);
    }

    public function list()
    {
        $user = Auth::user();
        $tasks = Task::query();

        if ($user->role === 'student') {
            $tasks->where('student_id', $user->id);
        } elseif ($user->role === 'coach') {
            $tasks->where('coach_id', $user->id);
        }

        $tasks = $tasks->orderBy('due_date', 'asc')
                      ->orderBy('created_at', 'desc')
                      ->get();

        return response()->json([
            'success' => true,
            'tasks' => $tasks
        ]);
    }

    public function addNote(Request $request, Task $task)
    {
        $request->validate([
            'note' => 'required|string'
        ]);

        $task->update([
            'student_notes' => $request->note
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Not başarıyla eklendi'
        ]);
    }

    public function approve(Task $task)
    {
        // Yetki kontrolü
        if (Auth::user()->role !== 'coach' || Auth::id() !== $task->coach_id) {
            return response()->json(['success' => false, 'message' => 'Bu işlem için yetkiniz yok.'], 403);
        }

        // Görevin tamamlanmış olduğunu kontrol et
        if (!$task->completed) {
            return response()->json(['success' => false, 'message' => 'Bu görev henüz tamamlanmamış.'], 400);
        }

        // Görevi onayla
        $task->update([
            'approved' => true,
            'approved_at' => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function reject(Task $task)
    {
        // Yetki kontrolü
        if (Auth::user()->role !== 'coach' || Auth::id() !== $task->coach_id) {
            return response()->json(['success' => false, 'message' => 'Bu işlem için yetkiniz yok.'], 403);
        }

        // Görevin tamamlanmış olduğunu kontrol et
        if (!$task->completed) {
            return response()->json(['success' => false, 'message' => 'Bu görev henüz tamamlanmamış.'], 400);
        }

        // Görevi reddet
        $task->update([
            'completed' => false,
            'approved' => false,
            'completed_at' => null
        ]);

        return response()->json(['success' => true]);
    }
}
