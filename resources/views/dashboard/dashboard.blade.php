<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
</head>
<body>
    <header>
        <div class="logo" title="University Management System">
            <img src="./images/logo.png" alt="">
            <h2>A<span class="danger">T</span>AY</h2>
        </div>
        <div class="navbar">
            <a href="{{route('account.dashboard')}}" class="active">
                <span class="material-icons-sharp">home</span>
                <h3>Ana Menü</h3>
            </a>
            <a href="{{route('account.timeTable')}}" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Takvim</h3>
            </a> 
            <a href="{{route('account.examination')}}">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Ders İçerikleri</h3>
            </a>
            <a href="#" class="role-badge">
                <span class="material-icons-sharp">badge</span>
                <h3>{{Auth::user()->role}}</h3>
            </a>
            <a href="{{route('account.logout')}}">
                <span class="material-icons-sharp" onclick="">logout</span>
                <h3>Çıkış Yap</h3>
            </a>
        </div>
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
        
    </header>
    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg" alt="">
                    </div>
                    <div class="info">
                        <p><b>{{Auth::user()->name}}</b></p>
                        <small class="text-muted">12102030</small>
                    </div>
                </div>
                <div class="about">
                    <h5>Course</h5>
                    <p>BTech. Computer Science & Engineering</p>
                    <h5>DOB</h5>
                    <p>29-Feb-2020</p>
                    <h5>Contact</h5>
                    <p>1234567890</p>
                    <h5>Email</h5>
                    <p>unknown@gmail.com</p>
                    <h5>Address</h5>
                    <p>Ghost town Road, New York, America</p>
                </div>
            </div>
        </aside>

        <main>
            <h1>Görevlerim</h1>
            <div class="tasks-grid">
                @if($tasks->isEmpty())
                    <div class="empty-state">
                        <span class="material-icons-sharp">assignment_late</span>
                        <h2>Görev Bulunmadı</h2>
                        <p>Henüz size atanmış bir görev bulunmamaktadır.</p>
                    </div>
                @else
                    @foreach($tasks as $task)
                    <div class="task-card {{ $task->completed ? 'completed' : '' }}" onclick="toggleTask(this)" data-task-id="{{ $task->id }}">
                        <div class="card-status">
                            <div class="status-icon">
                                <span class="material-icons-sharp task-check">
                                    {{ $task->completed ? 'check_circle' : 'check_circle_outline' }}
                                </span>
                            </div>
                            <div class="due-date {{ strtotime($task->due_date) < time() ? 'overdue' : '' }}">
                                <span class="material-icons-sharp">event</span>
                                {{ \Carbon\Carbon::parse($task->due_date)->format('d.m.Y') }}
                            </div>
                        </div>
                        <div class="card-content">
                            <h3>{{ $task->title }}</h3>
                            <p>{{ $task->description }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="task-meta">
                                <span class="material-icons-sharp">schedule</span>
                                {{ \Carbon\Carbon::parse($task->due_date)->diffForHumans() }}
                            </div>
                            <div class="completion-status">
                                {{ $task->completed ? 'Tamamlandı' : 'Devam Ediyor' }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </main>

        <div class="right">
            <div class="announcements">
                <h2>Görevlerim</h2>
                <div class="tasks">
                    @if(Auth::user()->role !== 'student')
                    <button class="add-task-btn" onclick="showTaskModal()">
                        <span class="material-icons-sharp">add</span>
                        Yeni Görev Ekle
                    </button>
                    @endif
                    <div id="tasksList">
                        @foreach($tasks as $task)
                        <div class="task-item" onclick="toggleTask(this)" data-task-id="{{ $task->id }}">
                            <div class="task-content">
                                <h3>{{ $task->title }}</h3>
                                <p>{{ $task->description }}</p>
                                <small class="text-muted">{{ $task->due_date }}</small>
                            </div>
                            <span class="material-icons-sharp task-check">
                                {{ $task->completed ? 'check_circle' : 'check_circle_outline' }}
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Görev Ekleme Modalı -->
            <div class="task-modal" id="taskModal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Yeni Görev Ekle</h3>
                        <span class="material-icons-sharp modal-close" onclick="hideTaskModal()">close</span>
                    </div>
                    <form id="addTaskForm" onsubmit="addNewTask(event)">
                        <div class="form-group">
                            <label>Görev Başlığı</label>
                            <input type="text" id="taskTitle" required>
                        </div>
                        <div class="form-group">
                            <label>Açıklama</label>
                            <textarea id="taskDescription" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Son Tarih</label>
                            <input type="date" id="taskDueDate" required>
                        </div>
                        <button type="submit" class="btn-submit">Kaydet</button>
                    </form>
                </div>
            </div>

            <div class="leaves">
                <h2>Teachers on leave</h2>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-2.jpeg" alt=""></div>
                    <div class="info">
                        <h3>The Professor</h3>
                        <small class="text-muted">Full Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-3.jpg" alt=""></div>
                    <div class="info">
                        <h3>Lisa Manobal</h3>
                        <small class="text-muted">Half Day</small>
                    </div>
                </div>
                <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-4.jpg" alt=""></div>
                    <div class="info">
                        <h3>Himanshu Jindal</h3>
                        <small class="text-muted">Full Day</small>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{url('js/timeTable.js')}}"></script>
    <script src="{{url('js/app.js')}}"></script>
    <style>
        .tasks {
            margin-top: 1rem;
        }
        
        .task-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            background: var(--color-white);
            border-radius: 0.7rem;
            margin-bottom: 0.8rem;
            cursor: pointer;
            transition: all 300ms ease;
        }

        .task-item:hover {
            box-shadow: var(--box-shadow);
        }

        .task-content {
            flex: 1;
        }

        .task-content h3 {
            font-size: 1rem;
            margin-bottom: 0.3rem;
        }

        .task-content p {
            color: var(--color-dark-variant);
            font-size: 0.9rem;
            margin-bottom: 0.2rem;
        }

        .task-check {
            color: var(--color-dark-variant);
            transition: all 300ms ease;
        }

        .task-item.completed {
            background: rgba(0, 255, 0, 0.1);
        }

        .task-item.completed .task-check {
            color: var(--color-success);
        }

        .task-item.completed .task-content h3,
        .task-item.completed .task-content p {
            text-decoration: line-through;
            color: var(--color-dark-variant);
        }

        .add-task-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--color-primary);
            color: var(--color-white);
            padding: 0.7rem 1rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            margin-bottom: 1rem;
            transition: all 300ms ease;
        }

        .add-task-btn:hover {
            opacity: 0.8;
        }

        .task-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .task-modal.active {
            display: flex;
        }

        .modal-content {
            background: var(--color-white);
            padding: 2rem;
            border-radius: 1rem;
            width: 90%;
            max-width: 500px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-close {
            cursor: pointer;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--color-dark);
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--color-light);
            border-radius: 0.5rem;
            background: var(--color-background);
        }

        .btn-submit {
            width: 100%;
            padding: 0.8rem;
            background: var(--color-primary);
            color: var(--color-white);
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 300ms ease;
        }

        .btn-submit:hover {
            opacity: 0.8;
        }

        .role-badge {
            background: var(--color-primary) !important;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem !important;
            margin: 0.5rem 0;
        }

        .role-badge h3 {
            color: var(--color-white) !important;
            text-transform: capitalize;
        }

        .role-badge span {
            color: var(--color-white) !important;
        }

        main {
            padding: 2rem;
        }

        main h1 {
            color: var(--color-dark);
            margin-bottom: 2rem;
            font-size: 1.8rem;
        }

        .tasks-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 0.5rem;
        }

        .task-card {
            background: var(--color-white);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 300ms ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .task-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--color-primary);
            opacity: 0.7;
        }

        .task-card.completed::before {
            background: var(--color-success);
        }

        .task-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        .card-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .status-icon {
            font-size: 1.5rem;
        }

        .status-icon .task-check {
            color: var(--color-dark-variant);
            transition: all 300ms ease;
        }

        .completed .status-icon .task-check {
            color: var(--color-success);
        }

        .due-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--color-dark-variant);
        }

        .due-date.overdue {
            color: var(--color-danger);
        }

        .due-date span {
            font-size: 1.2rem;
        }

        .card-content {
            margin: 1rem 0;
        }

        .card-content h3 {
            color: var(--color-dark);
            font-size: 1.2rem;
            margin-bottom: 0.8rem;
            line-height: 1.4;
        }

        .card-content p {
            color: var(--color-dark-variant);
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--color-light);
        }

        .task-meta {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--color-dark-variant);
            font-size: 0.85rem;
        }

        .task-meta span {
            font-size: 1.1rem;
        }

        .completion-status {
            font-size: 0.85rem;
            padding: 0.4rem 0.8rem;
            border-radius: 1rem;
            background: var(--color-light);
            color: var(--color-dark);
        }

        .completed .completion-status {
            background: rgba(0, 255, 0, 0.1);
            color: var(--color-success);
        }

        .completed .card-content h3,
        .completed .card-content p {
            color: var(--color-dark-variant);
        }

        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 3rem;
            background: var(--color-white);
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .empty-state span {
            font-size: 4rem;
            color: var(--color-dark-variant);
            margin-bottom: 1rem;
        }

        .empty-state h2 {
            color: var(--color-dark);
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: var(--color-dark-variant);
        }

        @media screen and (max-width: 768px) {
            .tasks-grid {
                grid-template-columns: 1fr;
            }

            main {
                padding: 1rem;
            }
        }
    </style>

    <script>
        function showTaskModal() {
            document.getElementById('taskModal').classList.add('active');
        }

        function hideTaskModal() {
            document.getElementById('taskModal').classList.remove('active');
            document.getElementById('addTaskForm').reset();
        }

        function addNewTask(event) {
            event.preventDefault();
            
            const formData = {
                title: document.getElementById('taskTitle').value,
                description: document.getElementById('taskDescription').value,
                due_date: document.getElementById('taskDueDate').value,
                _token: '{{ csrf_token() }}'
            };

            fetch('{{ route("tasks.store") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Yeni görevi listeye ekle
                    const tasksList = document.getElementById('tasksList');
                    const taskElement = createTaskElement(data.task);
                    tasksList.insertBefore(taskElement, tasksList.firstChild);
                    
                    // Modalı kapat ve formu temizle
                    hideTaskModal();
                    showNotification('Görev başarıyla eklendi!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Görev eklenirken bir hata oluştu!', 'error');
            });
        }

        function createTaskElement(task) {
            const taskDiv = document.createElement('div');
            taskDiv.className = 'task-item';
            taskDiv.setAttribute('data-task-id', task.id);
            taskDiv.onclick = function() { toggleTask(this); };

            taskDiv.innerHTML = `
                <div class="task-content">
                    <h3>${task.title}</h3>
                    <p>${task.description}</p>
                    <small class="text-muted">${task.due_date}</small>
                </div>
                <span class="material-icons-sharp task-check">check_circle_outline</span>
            `;

            return taskDiv;
        }

        function toggleTask(element) {
            const taskId = element.getAttribute('data-task-id');
            const isCompleted = element.classList.contains('completed');

            fetch(`{{ url('/tasks') }}/${taskId}/toggle`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    completed: !isCompleted
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    element.classList.toggle('completed');
                    const checkIcon = element.querySelector('.task-check');
                    const statusText = element.querySelector('.completion-status');
                    
                    checkIcon.textContent = element.classList.contains('completed') ? 'check_circle' : 'check_circle_outline';
                    statusText.textContent = element.classList.contains('completed') ? 'Tamamlandı' : 'Devam Ediyor';
                    
                    showNotification(data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('Bir hata oluştu!', 'error');
            });
        }

        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            document.body.appendChild(notification);

            notification.style.position = 'fixed';
            notification.style.bottom = '20px';
            notification.style.right = '20px';
            notification.style.backgroundColor = type === 'success' ? 'var(--color-success)' : 'var(--color-danger)';
            notification.style.color = 'white';
            notification.style.padding = '1rem 2rem';
            notification.style.borderRadius = '0.5rem';
            notification.style.animation = 'slideIn 0.5s ease-out';
            notification.style.zIndex = '1000';

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