<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OgrenciSoruAnalizController extends Controller
{
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $task = Task::find($request->task_id);
            // Analiz kaydını oluştur
            DB::table('ogrenci_ders_analizi')->insert([
                'task_id' => $request->task_id,
                'student_id' => $task->student_id,
                'ders_type' => $task->ders_type,
                'dogru_soru_sayisi' => $request->dogru_sayisi,
                'yanlis_soru_sayisi' => $request->yanlis_sayisi,
                'bos_soru_sayisi' => $request->bos_sayisi,
                'dakika' => $request->sure,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Görevi tamamlandı olarak işaretle
            $task->completed = true;
            $task->save();

            DB::commit();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Kayıt sırasında hata oluştu.']);
        }
    }

    public function show($task_id)
    {
        $analiz = \DB::table('ogrenci_ders_analizi')->where('task_id', $task_id)->first();
        if (!$analiz) {
            return response()->json(['success' => false, 'message' => 'Analiz kaydı bulunamadı.']);
        }
        return response()->json(['success' => true, 'analiz' => $analiz]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'dogru_sayisi' => 'required|integer|min:0',
            'yanlis_sayisi' => 'required|integer|min:0',
            'bos_sayisi' => 'required|integer|min:0',
            'sure' => 'required|integer|min:1',
            'ders_type' => 'required|string',
        ]);

        $analiz = \DB::table('ogrenci_ders_analizi')->where('task_id', $request->task_id);
        if (!$analiz->exists()) {
            return response()->json(['success' => false, 'message' => 'Analiz kaydı bulunamadı.']);
        }
        $analiz->update([
            'dogru_soru_sayisi' => $request->dogru_sayisi,
            'yanlis_soru_sayisi' => $request->yanlis_sayisi,
            'bos_soru_sayisi' => $request->bos_sayisi,
            'dakika' => $request->sure,
            'ders_type' => $request->ders_type,
            'updated_at' => now(),
        ]);
        return response()->json(['success' => true]);
    }

    public function studentAnalysis($student_id)
    {
        // dd($student_id); // Debug satırı kaldırıldı
        $tasks = \DB::table('ogrenci_ders_analizi')
            ->where('student_id', $student_id)
            ->orderByDesc('created_at')
            ->get();

        $totalDogru = $tasks->sum('dogru_soru_sayisi');
        $totalYanlis = $tasks->sum('yanlis_soru_sayisi');
        $totalBos = $tasks->sum('bos_soru_sayisi');
        $totalMinutes = $tasks->sum('dakika');

        $student = \App\Models\User::find($student_id);
        $studentName = $student ? $student->name : 'Öğrenci';

        return view('dashboard.analysis', [
            'tasks' => $tasks,
            'totalDogru' => $totalDogru,
            'totalYanlis' => $totalYanlis,
            'totalBos' => $totalBos,
            'totalMinutes' => $totalMinutes,
            'studentName' => $studentName
        ]);
    }
} 