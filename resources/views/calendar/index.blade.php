<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Takvim ve Notlar</title>
</head>
<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #8e44ad, #6a1b9a);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    
        .calendar-wrapper {
            width: 100%;
            max-width: 1000px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 30px;
            overflow: hidden;
        }
    
        .calendar-header {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
    
        .calendar-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #6a1b9a;
            margin-bottom: 10px;
        }
    
        .calendar-header p {
            color: #7d7d7d;
            font-size: 1rem;
        }
    
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 15px;
            text-align: center;
        }
    
        .calendar-day {
            background: #f5f6fa;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            position: relative;
        }
    
        .calendar-day:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }
    
        .calendar-day h3 {
            font-size: 1.4rem;
            font-weight: bold;
            margin: 0;
            color: #6a1b9a;
        }
    
        .calendar-day form {
            margin-top: 15px;
        }
    
        .calendar-day textarea {
            width: 100%;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 0.9rem;
            transition: border 0.3s;
            resize: none;
        }
    
        .calendar-day textarea:focus {
            border-color: #6a1b9a;
        }
    
        .calendar-day button {
            margin-top: 10px;
            padding: 10px 18px;
            background: #6a1b9a;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            transition: background 0.3s;
        }
    
        .calendar-day button:hover {
            background: #8e44ad;
        }
    
        .calendar-day .note {
            background-color: #eaeaea;
            padding: 8px;
            border-radius: 8px;
            font-size: 0.9rem;
            color: #333;
            margin-top: 15px;
        }
    
        .calendar-day .note p {
            margin: 0;
        }
    
    </style>
    
    <div class="calendar-wrapper">
        <div class="calendar-header">
            <h1>{{ $currentDate->format('F Y') }} Takvimi</h1>
            <p>Buradan istediğiniz gün için not ekleyebilirsiniz.</p>
        </div>
        <div class="calendar-grid">
            @foreach(array_chunk($daysInMonth, 7) as $week)
                @foreach($week as $day)
                    <div class="calendar-day">
                        <h3>{{ $day->day }}</h3>
                        @php
                            $note = \App\Models\Note::whereDate('date', $day->format('Y-m-d'))->first();
                        @endphp
                        @if($note)
                            <div class="note">
                                <p>{{ $note->note }}</p>
                            </div>
                        @endif
                        <form action="{{ route('notes.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="date" value="{{ $day->format('Y-m-d') }}">
                            <textarea name="note" placeholder="Not ekle..."></textarea>
                            <button type="submit">Kaydet</button>
                        </form>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    
</body>
</html>