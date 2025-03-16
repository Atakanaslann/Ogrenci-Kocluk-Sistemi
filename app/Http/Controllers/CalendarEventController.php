<?php

namespace App\Http\Controllers;

use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class CalendarEventController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('tr');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'category' => 'required|in:ders,odev,sinav,diger',
            'description' => 'nullable|string'
        ], [
            'title.required' => 'Başlık alanı zorunludur.',
            'date.required' => 'Tarih alanı zorunludur.',
            'start_time.required' => 'Başlangıç saati zorunludur.',
            'end_time.required' => 'Bitiş saati zorunludur.',
            'end_time.after' => 'Bitiş saati başlangıç saatinden sonra olmalıdır.',
            'category.required' => 'Kategori seçimi zorunludur.',
            'category.in' => 'Geçersiz kategori seçimi.'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            $event = new CalendarEvent();
            $event->user_id = Auth::id();
            $event->title = $request->title;
            $event->date = $request->date;
            $event->start_time = $request->start_time;
            $event->end_time = $request->end_time;
            $event->category = $request->category;
            $event->description = $request->description;
            $event->save();

            return response()->json([
                'success' => true,
                'message' => 'Etkinlik başarıyla eklendi!',
                'event' => $event
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Etkinlik eklenirken bir hata oluştu!'
            ], 500);
        }
    }

    public function getUserEvents()
    {
        try {
            $events = CalendarEvent::where('user_id', Auth::id())
                ->orderBy('date', 'asc')
                ->orderBy('start_time', 'asc')
                ->get();

            return response()->json($events);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Etkinlikler yüklenirken bir hata oluştu!'
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $event = CalendarEvent::where('user_id', Auth::id())
                ->where('id', $id)
                ->firstOrFail();

            $event->delete();

            return response()->json([
                'success' => true,
                'message' => 'Etkinlik başarıyla silindi!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Etkinlik silinirken bir hata oluştu!'
            ], 500);
        }
    }
}
