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
    <style>
        .calendar-container {
            background: var(--color-white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
            margin: 2rem;
            max-width: 800px;
            width: 100%;
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .calendar-header h2 {
            font-size: 1.8rem;
            color: var(--color-dark);
            font-weight: 600;
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
        }

        .calendar-navigation span:hover {
            background: var(--color-primary);
            color: var(--color-white);
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
            border: 1px solid var(--color-light);
            border-radius: 0.8rem;
            padding: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
        }

        .calendar-day:hover {
            background: var(--color-light);
        }

        .calendar-day.active {
            background: var(--color-primary);
            color: var(--color-white);
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
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
            margin: 2rem 0;
            flex: 1;
            max-width: 500px;
            height: fit-content;
        }

        .event-list h3 {
            margin-bottom: 1.5rem;
            color: var(--color-dark);
            font-size: 1.5rem;
            font-weight: 600;
        }

        .event-item {
            display: flex;
            align-items: center;
            padding: 1.2rem;
            border: 1px solid var(--color-light);
            border-radius: 0.8rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            background: var(--color-background);
            position: relative;
        }

        .event-item:hover {
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
            width: 3.5rem;
            height: 3.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .add-event-btn:hover {
            transform: scale(1.1);
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

        .modal-content {
            background: var(--color-white);
            padding: 2.5rem;
            border-radius: 1rem;
            width: 90%;
            max-width: 600px;
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
            padding: 1rem;
            border: 1px solid var(--color-light);
            border-radius: 0.8rem;
            font-size: 1rem;
            width: 100%;
            background: var(--color-background);
        }

        .btn-submit {
            background: var(--color-primary);
            color: var(--color-white);
            padding: 0.8rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            opacity: 0.9;
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
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/logo.png" alt="">
            <h2>A<span class="danger">T</span>AY</h2>
        </div>
        <div class="navbar">
            <a href="{{route('account.dashboard')}}">
                <span class="material-icons-sharp">home</span>
                <h3>Ana Menü</h3>
            </a>
            <a href="{{route('account.timeTable')}}" class="active">
                <span class="material-icons-sharp">today</span>
                <h3>Takvim</h3>
            </a> 
            <a href="{{route('account.examination')}}">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Ders İçerikleri</h3>
            </a>
            <a href="password.html">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a>
            <a href="{{route('account.logout')}}">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
        <div id="profile-btn" style="display: none;">
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
                <!-- Takvim günleri JavaScript ile doldurulacak -->
            </div>
        </div>

        <div class="event-list">
            <h3>Günlük Etkinlikler</h3>
            <div id="eventContainer">
                <!-- Etkinlikler JavaScript ile doldurulacak -->
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
                        <input type="text" id="eventTitle" required>
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
                            <option value="ders">Ders</option>
                            <option value="odev">Ödev</option>
                            <option value="sinav">Sınav</option>
                            <option value="diger">Diğer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Açıklama</label>
                        <textarea id="eventDescription" rows="3"></textarea>
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

            dayDiv.textContent = date.getDate();
            dayDiv.addEventListener('click', () => selectDate(date));
            
            // Etkinlik varsa işaretle
            if (hasEvents(date)) {
                dayDiv.classList.add('has-events');
            }

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
            
            // Seçili tarihe ait etkinlikleri filtrele ve sırala
            const dayEvents = events.filter(event => {
                const eventDate = new Date(event.date);
                const selectedDateStr = selectedDate.toISOString().split('T')[0];
                return event.date === selectedDateStr;
            }).sort((a, b) => a.start_time.localeCompare(b.start_time));

            if (dayEvents.length === 0) {
                eventContainer.innerHTML = '<p>Bu güne ait etkinlik bulunmamaktadır.</p>';
                return;
            }
            
            dayEvents.forEach(event => {
                const eventDiv = document.createElement('div');
                eventDiv.className = 'event-item';
                eventDiv.innerHTML = `
                    <span class="material-icons-sharp event-delete-btn" onclick="deleteEvent(${event.id})">delete</span>
                    <div class="event-time">${event.start_time} - ${event.end_time}</div>
                    <div class="event-details">
                        <h4>${event.title}</h4>
                        <p class="event-category">${getCategoryLabel(event.category)}</p>
                        <p>${event.description || ''}</p>
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