<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kişisel Takvim</title>
    {{ \Carbon\Carbon::setLocale('tr') }}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
    <style>
        .calendar-container {
            background: var(--color-white);
            padding: 2.5rem;
            border-radius: 1.5rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            margin: 2rem;
            max-width: 800px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .calendar-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--color-light);
        }

        .calendar-header h2 {
            font-size: 2rem;
            color: var(--color-dark);
            font-weight: 600;
            letter-spacing: -0.5px;
        }

        .calendar-navigation {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .calendar-navigation span {
            cursor: pointer;
            padding: 0.8rem;
            border-radius: 50%;
            transition: all 0.3s ease;
            background: var(--color-light);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calendar-navigation span:hover {
            background: var(--color-primary);
            color: var(--color-white);
            transform: scale(1.1);
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .calendar-day-header {
            text-align: center;
            font-weight: 600;
            padding: 0.8rem;
            color: var(--color-dark);
            font-size: 1rem;
        }

        .calendar-day {
            aspect-ratio: 1;
            border: 2px solid var(--color-light);
            border-radius: 1rem;
            padding: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 0.3rem;
            font-size: 1.1rem;
            position: relative;
            background: var(--color-white);
        }

        .calendar-day .day-number {
            font-weight: 500;
            margin-bottom: 0.2rem;
        }

        .calendar-day .event-indicator {
            width: 20px;
            height: 3px;
            background: var(--color-primary);
            border-radius: 2px;
            opacity: 0;
            transform: scaleX(0);
            transition: all 0.3s ease;
        }

        .calendar-day.has-events .event-indicator {
            opacity: 1;
            transform: scaleX(1);
        }

        .calendar-day:hover .event-indicator {
            transform: scaleX(1.2);
        }

        .calendar-day.active .event-indicator {
            background: var(--color-white);
        }

        /* Farklı kategoriler için farklı renkli göstergeler */
        .calendar-day.has-events[data-event-type="ders"] .event-indicator {
            background: #4CAF50;
        }
        .calendar-day.has-events[data-event-type="odev"] .event-indicator {
            background: #2196F3;
        }
        .calendar-day.has-events[data-event-type="sinav"] .event-indicator {
            background: #F44336;
        }
        .calendar-day.has-events[data-event-type="diger"] .event-indicator {
            background: #9C27B0;
        }

        /* Birden fazla etkinlik türü varsa gösterge stili */
        .calendar-day.has-multiple-events .event-indicator {
            background: linear-gradient(to right, #4CAF50, #2196F3, #F44336, #9C27B0);
        }

        .calendar-day:hover {
            background: var(--color-light);
            border-color: var(--color-primary);
            transform: scale(1.05);
        }

        .calendar-day.active {
            background: var(--color-primary);
            color: var(--color-white);
            border-color: var(--color-primary);
            transform: scale(1.05);
        }

        .calendar-day.has-events {
            border-bottom: 3px solid var(--color-primary);
        }

        main {
            display: flex;
            gap: 2rem;
            padding: 0 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .event-list {
            background: var(--color-white);
            padding: 2.5rem;
            border-radius: 1.5rem;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
            margin: 2rem 0;
            flex: 1;
            max-width: 500px;
            height: fit-content;
            transition: all 0.3s ease;
        }

        .event-list:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.12);
        }

        .event-list h3 {
            margin-bottom: 2rem;
            color: var(--color-dark);
            font-size: 1.8rem;
            font-weight: 600;
            letter-spacing: -0.5px;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--color-light);
        }

        .event-item {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            border: 2px solid var(--color-light);
            border-radius: 1rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            background: var(--color-background);
            position: relative;
        }

        .event-item:hover {
            transform: translateX(5px);
            border-color: var(--color-primary);
            background: var(--color-light);
        }

        .event-delete-btn {
            position: absolute;
            top: 0.5rem;
            right: 0.5rem;
            cursor: pointer;
            color: var(--color-danger);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .event-item:hover .event-delete-btn {
            opacity: 1;
        }

        .event-delete-btn:hover {
            transform: scale(1.2);
        }

        .event-time {
            margin-right: 1.5rem;
            padding: 0.8rem 1.2rem;
            background: var(--color-primary);
            color: var(--color-white);
            border-radius: 0.5rem;
            font-weight: 500;
            min-width: 100px;
            text-align: center;
        }

        .event-details h4 {
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
            color: var(--color-dark);
        }

        .event-details p {
            color: var(--color-dark-variant);
            font-size: 0.9rem;
        }

        .add-event-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--color-primary);
            color: var(--color-white);
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .add-event-btn:hover {
            transform: scale(1.1) rotate(90deg);
            border-radius: 50%;
        }

        .event-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            align-items: center;
            justify-content: center;
        }

        .event-modal.active {
            display: flex;
        }

        .event-modal .modal-content {
            background: var(--color-white);
            padding: 3rem;
            border-radius: 1.5rem;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .modal-close {
            cursor: pointer;
        }

        .event-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .form-group label {
            font-weight: 500;
            color: var(--color-dark);
        }

        .form-group input, 
        .form-group textarea, 
        .form-group select {
            padding: 1.2rem;
            border: 2px solid var(--color-light);
            border-radius: 1rem;
            font-size: 1rem;
            width: 100%;
            background: var(--color-background);
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .btn-submit {
            background: var(--color-primary);
            color: var(--color-white);
            padding: 1.2rem;
            border: none;
            border-radius: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1.1rem;
            font-weight: 500;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.2);
        }

        @media screen and (max-width: 1200px) {
            main {
                flex-direction: column;
                align-items: center;
            }

            .calendar-container,
            .event-list {
                max-width: 800px;
                width: 100%;
                margin: 1rem 0;
            }
        }

        @media screen and (max-width: 768px) {
            .calendar-container,
            .event-list {
                margin: 1rem;
                padding: 1rem;
            }

            .calendar-day {
                padding: 0.5rem;
                font-size: 0.9rem;
            }

            .event-time {
                padding: 0.5rem;
                min-width: 80px;
            }
        }

        /* Dark mode için ek stiller */
        body.dark-mode {
            --color-background: #181a1e;
            --color-white: #202528;
            --color-dark: #edeffd;
            --color-dark-variant: #a3bdcc;
            --color-light: rgba(0, 0, 0, 0.4);
            --box-shadow: 0 2rem 3rem rgba(0, 0, 0, 0.4);
        }

        body.dark-mode .calendar-day {
            border-color: #2d3235;
            color: var(--color-dark);
        }

        body.dark-mode .calendar-day:hover {
            background: var(--color-light);
        }

        body.dark-mode .event-item {
            background: var(--color-background);
            border-color: #2d3235;
        }

        body.dark-mode .event-item:hover {
            background: var(--color-light);
        }

        body.dark-mode .form-group input,
        body.dark-mode .form-group textarea,
        body.dark-mode .form-group select {
            background: var(--color-background);
            border-color: #2d3235;
            color: var(--color-dark);
        }

        body.dark-mode .calendar-navigation span {
            background: var(--color-light);
            color: var(--color-dark);
        }

        body.dark-mode .calendar-navigation span:hover {
            background: var(--color-primary);
            color: var(--color-white);
        }

        body.dark-mode .calendar-day.today {
            background: var(--color-primary);
            color: var(--color-white);
        }

        body.dark-mode .event-modal {
            background: rgba(0, 0, 0, 0.8);
        }

        /* Tema değiştirici stilleri */
        .theme-toggler {
            background: var(--color-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 1.6rem;
            width: 4.2rem;
            cursor: pointer;
            border-radius: 0.4rem;
            padding: 0.2rem;
        }

        .theme-toggler span {
            font-size: 1.2rem;
            width: 50%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 0.2rem;
        }

        .theme-toggler span.active {
            background: var(--color-primary);
            color: white;
        }

        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            color: white;
            z-index: 1000;
            animation: slideIn 0.5s ease-out;
        }

        .notification.success {
            background-color: var(--color-success);
        }

        .notification.error {
            background-color: var(--color-danger);
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }

        /* Kategori renkleri */
        .event-item[data-category="ders"] {
            border-left: 4px solid #4CAF50;
        }
        .event-item[data-category="odev"] {
            border-left: 4px solid #2196F3;
        }
        .event-item[data-category="sinav"] {
            border-left: 4px solid #F44336;
        }
        .event-item[data-category="diger"] {
            border-left: 4px solid #9C27B0;
        }

        /* Takvimde etkinlik göstergeleri */
        .calendar-day .event-dots {
            position: absolute;
            bottom: 8px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 4px;
        }

        .calendar-day .event-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            margin: 0;
            transition: all 0.3s ease;
        }

        .calendar-day:hover .event-dot {
            transform: scale(1.2);
        }

        /* Boş durum mesajı */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--color-dark-variant);
            background: var(--color-background);
            border-radius: 1rem;
            border: 2px dashed var(--color-light);
        }
        .empty-state span {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            display: block;
            color: var(--color-primary);
            opacity: 0.5;
        }
        .empty-state p {
            font-size: 1.1rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo" title="ATAY KOÇ">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" alt="ATAY KOÇ Logo">
            <h2>A<span class="danger" style="color:#3b82f6;">T</span>AY KOÇ</h2>
        </div>
        <div class="navbar">
            <a href="{{route('account.dashboard')}}">
                <span class="material-icons-sharp">home</span>
                <h3>Ana Menü</h3>
            </a>
            <a href="{{route('account.timeTable')}}" class="active">
                <span class="material-icons-sharp">today</span>
                <h3>Kişisel Takvim</h3> 
            </a>
            <a href="{{ route('account.messages') }}" class="chat-link">
                <span class="material-icons-sharp">chat</span>
                <h3>Mesajlarım</h3>
                <span class="message-badge" id="messageBadge" style="display: none;">0</span>
            </a>
            <a href="/profile" target="_blank" class="profile-link" style="display: flex; align-items: center; gap: 0.5rem;">
                <span class="material-icons-sharp">person</span>
                <h3>Profil</h3>
            </a>
            <form method="POST" action="{{ route('account.logout') }}" style="display:flex;align-items:center;gap:0.5rem;margin-left:auto;">
                @csrf
                <button type="submit" style="background:transparent;border:none;padding:0 12px;height:48px;display:flex;align-items:center;color:#6c757d;font-weight:500;font-size:1.05rem;cursor:pointer;border-radius:0.7rem;transition:background 0.2s, color 0.2s;">
                    <span class="material-icons-sharp" style="font-size:1.6rem;margin-right:0.3rem;">logout</span>
                    <span style="font-size:1.08rem;">Çıkış Yap</span>
                </button>
            </form>
        </div>
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
    </header>

    <main>
        <div class="calendar-container">
            <div class="calendar-header">
                <div class="calendar-navigation">
                    <span class="material-icons-sharp" id="prevMonth">chevron_left</span>
                    <h2 id="currentMonth">Mayıs 2024</h2>
                    <span class="material-icons-sharp" id="nextMonth">chevron_right</span>
                </div>
            </div>
            <div class="calendar-grid">
                <div class="calendar-day-header">Pzt</div>
                <div class="calendar-day-header">Sal</div>
                <div class="calendar-day-header">Çar</div>
                <div class="calendar-day-header">Per</div>
                <div class="calendar-day-header">Cum</div>
                <div class="calendar-day-header">Cmt</div>
                <div class="calendar-day-header">Paz</div>
            </div>
        </div>

        <div class="event-list">
            <h3>Günlük Etkinlikler</h3>
            <div id="eventContainer">
                <div class="empty-state">
                    <span class="material-icons-sharp">event_busy</span>
                    <p>Bu güne ait etkinlik bulunmamaktadır.</p>
                </div>
            </div>
        </div>

        <div class="add-event-btn" onclick="showEventModal()">
            <span class="material-icons-sharp">add</span>
        </div>

        <div class="event-modal" id="eventModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Yeni Etkinlik Ekle</h3>
                    <span class="material-icons-sharp modal-close" onclick="hideEventModal()">close</span>
                </div>
                <form class="event-form" onsubmit="addEvent(event)">
                    <div class="form-group">
                        <label>Etkinlik Başlığı</label>
                        <input type="text" id="eventTitle" required placeholder="Örn: Matematik Dersi">
                    </div>
                    <div class="form-group">
                        <label>Tarih</label>
                        <input type="date" id="eventDate" required>
                    </div>
                    <div class="form-group">
                        <label>Başlangıç Saati</label>
                        <input type="time" id="eventStartTime" required>
                    </div>
                    <div class="form-group">
                        <label>Bitiş Saati</label>
                        <input type="time" id="eventEndTime" required>
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select id="eventCategory" required>
                            <option value="">Kategori seçin</option>
                            <option value="ders">Ders</option>
                            <option value="odev">Ödev</option>
                            <option value="sinav">Sınav</option>
                            <option value="diger">Diğer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea id="eventDescription" rows="3" placeholder="Etkinlik detaylarını buraya yazabilirsiniz..."></textarea>
                    </div>
                    <button type="submit" class="btn-submit">Kaydet</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        // Takvim işlemleri
        let currentDate = new Date();
        let selectedDate = new Date();
        let events = []; // Etkinlikleri saklamak için dizi

        // Sayfa yüklendiğinde kullanıcının etkinliklerini yükle
        function loadUserEvents() {
            fetch('{{ route("calendar.events.user") }}')
                .then(response => response.json())
                .then(data => {
                    events = data;
                    updateCalendar();
                    updateEventList();
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Etkinlikler yüklenirken bir hata oluştu!', 'error');
                });
        }

        function updateCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            
            document.getElementById('currentMonth').textContent = 
                new Date(year, month).toLocaleString('tr-TR', { month: 'long', year: 'numeric' });

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startDay = firstDay.getDay() === 0 ? 6 : firstDay.getDay() - 1;
            
            const calendarGrid = document.querySelector('.calendar-grid');
            const dayHeaders = document.querySelectorAll('.calendar-day-header');
            
            // Mevcut günleri temizle
            while (calendarGrid.children.length > 7) {
                calendarGrid.removeChild(calendarGrid.lastChild);
            }

            // Önceki ayın son günleri
            for (let i = 0; i < startDay; i++) {
                const prevDate = new Date(year, month, -startDay + i + 1);
                const dayDiv = createDayElement(prevDate, true);
                calendarGrid.appendChild(dayDiv);
            }

            // Mevcut ayın günleri
            for (let i = 1; i <= lastDay.getDate(); i++) {
                const date = new Date(year, month, i);
                const dayDiv = createDayElement(date);
                calendarGrid.appendChild(dayDiv);
            }

            // Sonraki ayın ilk günleri
            const remainingDays = 42 - (startDay + lastDay.getDate());
            for (let i = 1; i <= remainingDays; i++) {
                const nextDate = new Date(year, month + 1, i);
                const dayDiv = createDayElement(nextDate, true);
                calendarGrid.appendChild(dayDiv);
            }
        }

        function createDayElement(date, isOtherMonth = false) {
            const dayDiv = document.createElement('div');
            dayDiv.className = 'calendar-day';
            if (isOtherMonth) dayDiv.style.opacity = '0.5';
            
            const today = new Date();
            if (date.toDateString() === today.toDateString()) {
                dayDiv.classList.add('today');
            }
            if (date.toDateString() === selectedDate.toDateString()) {
                dayDiv.classList.add('active');
            }

            // Gün numarası için div
            const dayNumber = document.createElement('div');
            dayNumber.className = 'day-number';
            dayNumber.textContent = date.getDate();
            dayDiv.appendChild(dayNumber);

            // Etkinlik göstergesi için div
            const indicator = document.createElement('div');
            indicator.className = 'event-indicator';
            dayDiv.appendChild(indicator);
            
            // Etkinlik kontrolü
            const dateStr = date.toISOString().split('T')[0];
            const dayEvents = events.filter(event => event.date === dateStr);
            
            if (dayEvents.length > 0) {
                dayDiv.classList.add('has-events');
                
                // Etkinlik kategorilerini kontrol et
                const categories = [...new Set(dayEvents.map(event => event.category))];
                
                if (categories.length > 1) {
                    dayDiv.classList.add('has-multiple-events');
                } else {
                    dayDiv.setAttribute('data-event-type', categories[0]);
                }
            }

            dayDiv.addEventListener('click', () => selectDate(date));
            return dayDiv;
        }

        function selectDate(date) {
            selectedDate = date;
            document.querySelectorAll('.calendar-day').forEach(day => {
                day.classList.remove('active');
            });
            event.currentTarget.classList.add('active');
            updateEventList();
            
            // Seçilen tarihi otomatik olarak form'a ekle
            document.getElementById('eventDate').valueAsDate = date;
        }

        function hasEvents(date) {
            const dateStr = date.toISOString().split('T')[0];
            return events.some(event => event.date === dateStr);
        }

        function updateEventList() {
            const eventContainer = document.getElementById('eventContainer');
            eventContainer.innerHTML = '';
            
            const dayEvents = events.filter(event => {
                const eventDate = new Date(event.date);
                const selectedDateStr = selectedDate.toISOString().split('T')[0];
                return event.date === selectedDateStr;
            }).sort((a, b) => a.start_time.localeCompare(b.start_time));

            if (dayEvents.length === 0) {
                eventContainer.innerHTML = `
                    <div class="empty-state">
                        <span class="material-icons-sharp">event_busy</span>
                        <p>Bu güne ait etkinlik bulunmamaktadır.</p>
                    </div>
                `;
                return;
            }
            
            dayEvents.forEach(event => {
                const eventDiv = document.createElement('div');
                eventDiv.className = 'event-item';
                eventDiv.setAttribute('data-category', event.category);
                eventDiv.innerHTML = `
                    <span class="material-icons-sharp event-delete-btn" onclick="deleteEvent(${event.id})">delete</span>
                    <div class="event-time">${event.start_time.substring(0,5)} - ${event.end_time.substring(0,5)}</div>
                    <div class="event-details">
                        <h4>${event.title}</h4>
                        <p class="event-category">${getCategoryLabel(event.category)}</p>
                        ${event.description ? `<p>${event.description}</p>` : ''}
                    </div>
                `;
                eventContainer.appendChild(eventDiv);
            });
        }

        function getCategoryLabel(category) {
            const categories = {
                'ders': 'Ders',
                'odev': 'Ödev',
                'sinav': 'Sınav',
                'diger': 'Diğer'
            };
            return categories[category] || category;
        }

        function showEventModal() {
            const modal = document.getElementById('eventModal');
            modal.classList.add('active');
            
            // ESC tuşu ile modalı kapatma
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    hideEventModal();
                }
            });
            
            // Modal dışına tıklayınca kapatma
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    hideEventModal();
                }
            });
        }

        function hideEventModal() {
            const modal = document.getElementById('eventModal');
            modal.classList.remove('active');
            document.querySelector('.event-form').reset();
        }

        function addEvent(event) {
            event.preventDefault();
            
            const formData = {
                title: document.getElementById('eventTitle').value,
                date: document.getElementById('eventDate').value,
                start_time: document.getElementById('eventStartTime').value,
                end_time: document.getElementById('eventEndTime').value,
                category: document.getElementById('eventCategory').value,
                description: document.getElementById('eventDescription').value
            };

            fetch('{{ route("calendar.events.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    events.push(data.event);
                    document.querySelector('.event-form').reset();
                    hideEventModal();
                    updateCalendar();
                    updateEventList();
                    showNotification('Etkinlik başarıyla eklendi!');
                } else {
                    showNotification(data.message || 'Etkinlik eklenirken bir hata oluştu!', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Etkinlik eklenirken bir hata oluştu!', 'error');
            });
        }

        function deleteEvent(eventId) {
            if (confirm('Bu etkinliği silmek istediğinizden emin misiniz?')) {
                fetch(`/calendar-events/${eventId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        events = events.filter(event => event.id !== eventId);
                        updateCalendar();
                        updateEventList();
                        showNotification('Etkinlik başarıyla silindi!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showNotification('Etkinlik silinirken bir hata oluştu!', 'error');
                });
            }
        }

        // Event Listeners
        document.getElementById('prevMonth').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            updateCalendar();
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            updateCalendar();
        });

        // Sayfa yüklendiğinde takvimi başlat
        updateCalendar();
        updateEventList();

        // Tema değiştirici için yeni kodlar
        const themeToggler = document.querySelector('.theme-toggler');
        const themeIcons = document.querySelectorAll('.theme-toggler span');

        // Sayfa yüklendiğinde kaydedilmiş temayı kontrol et
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark') {
                document.body.classList.add('dark-mode');
                themeIcons[0].classList.remove('active');
                themeIcons[1].classList.add('active');
            }
        });

        // Tema değiştirme işlevi
        themeToggler.addEventListener('click', () => {
            document.body.classList.toggle('dark-mode');
            themeIcons.forEach(icon => {
                icon.classList.toggle('active');
            });

            // Temayı localStorage'a kaydet
            const isDark = document.body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });

        // Sayfa yüklendiğinde etkinlikleri yükle
        document.addEventListener('DOMContentLoaded', function() {
            loadUserEvents();
        });

        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            document.body.appendChild(notification);

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.5s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 3000);
        }
    </script>
</body>
</html>