<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CalendarEvent;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCalendarController extends Controller
{
    public function index()
    {
        $students = User::where('role', 'student')->get();
        $coaches = User::where('role', 'coach')->get();
        return view('admin.calendar.index', compact('students', 'coaches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'student_id' => 'required|exists:users,id',
            'coach_id' => 'required|exists:users,id',
            'color' => 'required|string|max:7',
        ]);

        CalendarEvent::create($request->all());

        return response()->json(['message' => 'Etkinlik başarıyla oluşturuldu.']);
    }

    public function getEvents()
    {
        $events = CalendarEvent::with(['student', 'coach'])->get();
        return response()->json($events);
    }

    public function update(Request $request, CalendarEvent $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'student_id' => 'required|exists:users,id',
            'coach_id' => 'required|exists:users,id',
            'color' => 'required|string|max:7',
        ]);

        $event->update($request->all());

        return response()->json(['message' => 'Etkinlik başarıyla güncellendi.']);
    }

    public function destroy(CalendarEvent $event)
    {
        $event->delete();

        return response()->json(['message' => 'Etkinlik başarıyla silindi.']);
    }
} 