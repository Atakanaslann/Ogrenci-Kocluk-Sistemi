<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        // Şu anki tarihi al
        $currentDate = Carbon::now();
        
        // Bu ayın ilk günü
        $firstDayOfMonth = $currentDate->copy()->startOfMonth();
        
        // Bu ayın son günü
        $lastDayOfMonth = $currentDate->copy()->endOfMonth();
        
        // Ayın tüm günlerini al
        $daysInMonth = [];
        $day = $firstDayOfMonth;
        
        while ($day <= $lastDayOfMonth) {
            $daysInMonth[] = $day->copy();
            $day->addDay();
        }

        // Takvim view'ını döndür
        return view('calendar.index', compact('daysInMonth', 'currentDate'));
    }
}
