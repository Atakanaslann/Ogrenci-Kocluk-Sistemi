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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
</head>
<body>
    <header>
        <div class="logo" title="ATAY KOÇ">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" alt="ATAY KOÇ Logo">
            <h2>A<span class="danger" style="color:#3b82f6;">T</span>AY KOÇ</h2>
        </div>
        <div class="navbar">
            <a href="{{route('account.dashboard')}}" class="active">
                <span class="material-icons-sharp">home</span>
                <h3>Ana Menü</h3>
            </a>
            <a href="{{route('account.timeTable')}}" onclick="timeTableAll()">
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
    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-info">
                        <div class="profile-icon">
                            <span class="material-icons-sharp">person</span>
                        </div>
                        <div class="info">
                            <p><b>{{Auth::user()->name}}</b></p>
                        </div>
                    </div>
                </div>
                <div class="about">
                    <h5>Email</h5>
                    <p>{{Auth::user()->email}}</p>
                </div>
            </div>
        </aside>

        <main>
            <div class="tasks-section">
                <h1>Devam Eden Görevler <span class="badge bg-primary" style="font-size:1rem; vertical-align:middle; margin-left:0.5rem;">{{$tasks->where('completed', false)->count()}}</span></h1>
                <div class="tasks-grid">
                    @if($tasks->where('completed', false)->isEmpty())
                        <div class="empty-state">
                            <span class="material-icons-sharp">assignment_late</span>
                            <h2>Görev Bulunmadı</h2>
                            <p>Henüz devam eden bir göreviniz bulunmamaktadır.</p>
                        </div>
                    @else
                        @foreach($tasks->where('completed', false) as $task)
                        <div class="task-card" onclick="toggleTask(this)" data-task-id="{{ $task->id }}">
                            <div class="card-status">
                                <div class="status-icon">
                                    <span class="material-icons-sharp task-check">check_circle_outline</span>
                                </div>
                                <div class="due-date {{ strtotime($task->due_date) < time() ? 'overdue' : '' }}">
                                    <span class="material-icons-sharp">event</span>
                                    {{ \Carbon\Carbon::parse($task->due_date)->format('d.m.Y') }}
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="task-type-badge {{ $task->task_type }}">
                                    @if($task->task_type == 'ders')
                                        <span class="material-icons-sharp">school</span>
                                        Ders Görevi
                                    @else
                                        <span class="material-icons-sharp">assignment</span>
                                        {{ $task->deneme_type == 'tekders' ? 'Tek Ders Denemesi' : 'Genel Deneme' }}
                                    @endif
                                </div>
                                <h3>{{ $task->title }}</h3>
                                @if($task->task_type == 'ders')
                                    <div class="task-details">
                                        <div class="detail-item">
                                            <span class="material-icons-sharp">book</span>
                                            <p>{{ ucfirst($task->ders_type) }}</p>
                                        </div>
                                        <div class="detail-item">
                                            <span class="material-icons-sharp">subject</span>
                                            <p>{{ $task->ders_konu }}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="task-details">
                                        @if($task->deneme_type == 'tekders')
                                            <div class="detail-item">
                                                <span class="material-icons-sharp">book</span>
                                                <p>{{ ucfirst($task->deneme_ders) }}</p>
                                            </div>
                                        @endif
                                        <div class="detail-item">
                                            <span class="material-icons-sharp">timer</span>
                                            <p>{{ $task->deneme_sure }} Dakika</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="task-description">
                                    <p>{{ $task->description }}</p>
                                </div>
                            </div>
                            <div class="card-footer">
                                @if($task->completed && !$task->approved)
                                    <div class="completion-status waiting-approval">Koç Onayı Bekleniyor</div>
                                @elseif($task->completed && $task->approved)
                                    <div class="completion-status completed">Koç Onayladı</div>
                                @else
                                    <div class="completion-status">Devam Ediyor</div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="tasks-section completed-tasks">
                <div class="completed-header" style="display: flex; align-items: center; gap: 0.5rem;">
                    <h1 style="margin-bottom: 0;">Tamamlanan Görevler</h1>
                    <button id="toggleCompletedTasks" aria-label="Tamamlanan Görevleri Göster/Gizle" style="background: none; border: none; cursor: pointer; display: flex; align-items: center; padding: 0;">
                        <span id="completedChevron" class="material-icons-sharp" style="font-size: 2rem; transition: transform 0.3s;">expand_more</span>
                    </button>
                </div>
                <div id="completedTasksWrapper" style="overflow: hidden; transition: max-height 0.4s cubic-bezier(0.4,0,0.2,1); max-height: 0;">
                    <div class="tasks-grid">
                        @if($tasks->where('completed', true)->isEmpty())
                            <div class="empty-state">
                                <span class="material-icons-sharp">assignment_turned_in</span>
                                <h2>Görev Bulunmadı</h2>
                                <p>Henüz tamamlanmış bir göreviniz bulunmamaktadır.</p>
                            </div>
                        @else
                            @foreach($tasks->where('completed', true) as $task)
                            <div class="task-card completed collapsible-card" data-task-id="{{ $task->id }}">
                                <div class="card-status">
                                    <div class="status-icon">
                                        <span class="material-icons-sharp task-check">check_circle</span>
                                    </div>
                                    <div class="due-date">
                                        <span class="material-icons-sharp">event</span>
                                        {{ \Carbon\Carbon::parse($task->due_date)->format('d.m.Y') }}
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="task-type-badge {{ $task->task_type }}">
                                        @if($task->task_type == 'ders')
                                            <span class="material-icons-sharp">school</span>
                                            Ders Görevi
                                        @else
                                            <span class="material-icons-sharp">assignment</span>
                                            {{ $task->deneme_type == 'tekders' ? 'Tek Ders Denemesi' : 'Genel Deneme' }}
                                        @endif
                                    </div>
                                    <h3>{{ $task->title }}</h3>
                                    @if($task->task_type == 'ders')
                                        <div class="task-details">
                                            <div class="detail-item">
                                                <span class="material-icons-sharp">book</span>
                                                <p>{{ ucfirst($task->ders_type) }}</p>
                                            </div>
                                            <div class="detail-item">
                                                <span class="material-icons-sharp">subject</span>
                                                <p>{{ $task->ders_konu }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="task-details">
                                            @if($task->deneme_type == 'tekders')
                                                <div class="detail-item">
                                                    <span class="material-icons-sharp">book</span>
                                                    <p>{{ ucfirst($task->deneme_ders) }}</p>
                                                </div>
                                            @endif
                                            <div class="detail-item">
                                                <span class="material-icons-sharp">timer</span>
                                                <p>{{ $task->deneme_sure }} Dakika</p>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="task-description">
                                        <p>{{ $task->description }}</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    @if($task->completed && !$task->approved)
                                        <div class="completion-status waiting-approval">Koç Onayı Bekleniyor</div>
                                    @elseif($task->completed && $task->approved)
                                        <div class="completion-status completed">Koç Onayladı</div>
                                    @else
                                        <div class="completion-status">Devam Ediyor</div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Mesajlaşma Paneli -->
    <div class="chat-panel" id="chatPanel">
        <div class="chat-header modern-gradient-bg">
            <h3 class="chat-title">
                <span class="material-icons-sharp chat-icon">forum</span>
                Koçum ile Sohbet
            </h3>
            <button onclick="toggleChat()" class="close-button">×</button>
        </div>
        <div class="chat-messages" id="messages">
            <!-- Mesajlar buraya yüklenecek -->
        </div>
        <div class="chat-input modern-input-bg">
            <input type="text" id="messageInput" placeholder="Mesajınızı yazın...">
            <button onclick="sendMessage()">
                <span class="material-icons-sharp">send</span>
            </button>
        </div>
    </div>

    <!-- Analiz Modalı -->
    <div id="analizModal" class="modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); align-items:center; justify-content:center;">
        <div class="modal-content" style="background:#fff; padding:32px; border-radius:12px; max-width:400px; margin:auto; position:relative;">
            <span class="material-icons-sharp" style="position:absolute; right:16px; top:16px; cursor:pointer;" onclick="closeAnalizModal()">close</span>
            <h2>Görev Analizi</h2>
            <form id="analizForm">
                <input type="hidden" id="analiz_task_id" name="task_id">
                <div class="form-group">
                    <label>Doğru Soru Sayısı</label>
                    <input type="number" name="dogru_sayisi" min="0" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Yanlış Soru Sayısı</label>
                    <input type="number" name="yanlis_sayisi" min="0" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Boş Soru Sayısı</label>
                    <input type="number" name="bos_sayisi" min="0" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Süre (dakika)</label>
                    <input type="number" name="sure" min="1" class="form-control" required>
                </div>
                <button type="submit" class="btn-submit" style="margin-top:16px;">Kaydet</button>
            </form>
        </div>
    </div>

    <!-- Düzenleme Modalı -->
    <div id="editAnalizModal" class="modal" style="display:none; position:fixed; z-index:9999; left:0; top:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); align-items:center; justify-content:center;">
        <div class="modal-content" style="background:#fff; padding:32px; border-radius:12px; max-width:400px; margin:auto; position:relative;">
            <span class="material-icons-sharp" style="position:absolute; right:16px; top:16px; cursor:pointer;" onclick="closeEditAnalizModal()">close</span>
            <h2>Görev Analizi Düzenle</h2>
            <form id="editAnalizForm">
                <input type="hidden" id="edit_analiz_task_id" name="task_id">
                <div class="form-group">
                    <label>Doğru Soru Sayısı</label>
                    <input type="number" name="dogru_sayisi" id="edit_dogru_sayisi" min="0" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Yanlış Soru Sayısı</label>
                    <input type="number" name="yanlis_sayisi" id="edit_yanlis_sayisi" min="0" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Boş Soru Sayısı</label>
                    <input type="number" name="bos_sayisi" id="edit_bos_sayisi" min="0" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Süre (dakika)</label>
                    <input type="number" name="sure" id="edit_sure" min="1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Ders</label>
                    <input type="text" name="ders_type" id="edit_ders_type" class="form-control" required>
                </div>
                <button type="submit" class="btn-submit" style="margin-top:16px;">Kaydet</button>
            </form>
        </div>
    </div>

    <script src="{{url('js/timeTable.js')}}"></script>
    <script src="{{url('js/app.js')}}"></script>
    <style>
        :root {
            --color-primary: #6366f1;
            --color-primary-rgb: 99,102,241;
            --color-success: #22c55e;
            --color-success-light: #e6f9ed;
            --color-success-rgb: 34,197,94;
            --color-danger: #ef4444;
            --color-white: #fff;
            --color-light: #f3f4f6;
            --color-background: #f7f8fa;
            --color-dark: #22223b;
            --color-dark-variant: #6c757d;
        }
        body.dark-mode, .dark-mode {
            --color-primary: #6366f1;
            --color-primary-rgb: 99,102,241;
            --color-success: #22c55e;
            --color-success-light: #1e293b;
            --color-success-rgb: 34,197,94;
            --color-danger: #ef4444;
            --color-white: #23243a;
            --color-light: #2d2e4a;
            --color-background: #18192b;
            --color-dark: #f3f4f6;
            --color-dark-variant: #bfc2d4;
        }

        body {
            background: var(--color-background);
            color: var(--color-dark);
        }

        header, .navbar, .profile, .about, .card, .task-card, .modal-content, .empty-state, .tasks-section, .chat-panel, .note-modal-content {
            background: var(--color-white);
            color: var(--color-dark);
        }

        input, textarea, select {
            background: var(--color-background);
            color: var(--color-dark);
            border: 1px solid var(--color-light);
        }

        .card-footer, .task-details, .task-meta, .completion-status, .profile-icon, .role-badge {
            background: var(--color-light);
            color: var(--color-dark);
        }

        .task-card.completed {
            background: var(--color-success-light);
        }

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
            background: #f7f8fa;
            color: #23243a;
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
            background: #6366f1;
            color: #fff;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 300ms ease;
            font-weight: 600;
            letter-spacing: 0.5px;
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
            box-shadow: 0 4px 18px rgba(99,102,241,0.10);
            border: 1.5px solid #e0e3ef;
            background: var(--color-white);
            border-radius: 1.5rem;
            transition: box-shadow 0.2s, border 0.2s;
            padding: 1.2rem 1.2rem 0.5rem 1.2rem;
            display: flex;
            flex-direction: column;
            min-height: 340px;
        }
        .task-card:hover {
            box-shadow: 0 8px 28px rgba(99,102,241,0.16);
            border: 1.5px solid var(--color-primary);
        }

        .card-status {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.2rem;
        }

        .status-icon {
            font-size: 1.7rem;
            margin-right: 0.7rem;
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
            font-size: 1rem;
            color: var(--color-dark-variant);
        }

        .due-date.overdue {
            color: var(--color-danger);
        }

        .due-date span {
            font-size: 1.2rem;
        }

        .card-content {
            margin: 0.5rem 0 0.5rem 0;
            padding: 0 4px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
        }

        .card-content h3 {
            color: var(--color-dark);
            font-size: 1.18rem;
            margin-bottom: 0.5rem;
            line-height: 1.4;
            font-weight: 600;
        }

        .card-content p {
            color: var(--color-dark-variant);
            font-size: 0.98rem;
            line-height: 1.6;
        }

        .card-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 1rem 0 0.5rem 0;
            border-top: 1px solid var(--color-light);
            border-radius: 2.5rem;
            background: linear-gradient(90deg, rgba(99,102,241,0.08) 0%, rgba(99,102,241,0.03) 100%);
            box-shadow: 0 2px 12px 0 rgba(99,102,241,0.07);
            margin: 0 0.7rem 0.7rem 0.7rem;
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
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            background-color: var(--color-light);
        }

        .completed .completion-status {
            background-color: var(--color-success-light);
            color: var(--color-success);
        }

        .completed .card-content h3,
        .completed .card-content p {
            color: var(--color-dark-variant);
        }

        .empty-state {
            background: transparent !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            padding: 2.5rem 0 2.5rem 0;
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

        .chat-link {
            position: relative;
            cursor: pointer;
        }

        .message-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--color-danger);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .chat-panel {
            display: none;
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 370px;
            height: 540px;
            background: rgba(255,255,255,0.75);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px 0 rgba(99,102,241,0.18);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            z-index: 1000;
            flex-direction: column;
            border: 1.5px solid rgba(99,102,241,0.10);
            overflow: hidden;
            transition: box-shadow 0.2s, background 0.2s;
        }
        .chat-panel.active {
            display: flex;
        }
        .chat-header {
            background: linear-gradient(90deg, #6366f1 0%, #7f53ac 100%);
            color: #fff;
            padding: 1.1rem 1.7rem 1.1rem 1.5rem;
            border-radius: 1.5rem 1.5rem 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 12px rgba(99,102,241,0.10);
        }
        .chat-title {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
            font-size: 1.18rem;
            font-weight: 700;
            letter-spacing: 0.01em;
            margin: 0;
        }
        .chat-icon {
            font-size: 1.7rem;
            opacity: 0.92;
        }
        .close-button {
            background: rgba(255,255,255,0.16);
            border: none;
            color: #fff;
            font-size: 1.6rem;
            cursor: pointer;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }
        .close-button:hover {
            background: rgba(255,255,255,0.28);
        }
        .chat-messages {
            flex: 1;
            padding: 1.3rem 1.1rem 1.1rem 1.1rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
            background: linear-gradient(135deg, #f7f8fa 60%, #e0e7ff 100%);
            border-radius: 0 0 0 0;
            box-shadow: none;
        }
        .message {
            max-width: 80%;
            padding: 0.95rem 1.2rem;
            border-radius: 1.2rem;
            position: relative;
            word-wrap: break-word;
            margin: 0.2rem 0;
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
            font-size: 1.02rem;
            box-shadow: 0 2px 12px rgba(99,102,241,0.07);
            transition: background 0.2s, box-shadow 0.2s;
            border: 1.5px solid rgba(99,102,241,0.07);
            backdrop-filter: blur(2px);
        }
        .message.sent {
            align-self: flex-end;
            background: linear-gradient(120deg, #e0ffe9 60%, #baf3d7 100%);
            color: #23243a;
            border-bottom-right-radius: 0.5rem;
            margin-left: auto;
            border: 1.5px solid #baf3d7;
        }
        .message.received {
            align-self: flex-start;
            background: linear-gradient(120deg, #fff 60%, #e0e7ff 100%);
            color: #23243a;
            border-bottom-left-radius: 0.5rem;
            margin-right: auto;
            border: 1.5px solid #e0e7ff;
        }
        .message .content {
            margin-bottom: 0.22rem;
            line-height: 1.5;
            font-size: 1.02rem;
        }
        .message .time {
            font-size: 0.8rem;
            text-align: right;
            margin-top: 0.1rem;
            color: #7f53ac;
            opacity: 0.7;
        }
        .chat-input {
            padding: 1.1rem 1.3rem;
            background: rgba(255,255,255,0.82);
            border-top: 1.5px solid #e0e7ff;
            display: flex;
            gap: 0.8rem;
            border-radius: 0 0 1.5rem 1.5rem;
            box-shadow: 0 -2px 12px rgba(99,102,241,0.06);
        }
        .chat-input input {
            flex: 1;
            padding: 0.95rem 1.2rem;
            border: 1.5px solid #e0e7ff;
            border-radius: 1.5rem;
            font-size: 1.02rem;
            background: #fff;
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
            transition: border 0.2s, box-shadow 0.2s;
            box-shadow: 0 1px 4px rgba(99,102,241,0.04);
        }
        .chat-input input:focus {
            outline: none;
            border: 1.5px solid #6366f1;
            box-shadow: 0 2px 8px rgba(99,102,241,0.10);
        }
        .chat-input button {
            background: linear-gradient(135deg, #6366f1 60%, #7f53ac 100%);
            color: white;
            border: none;
            border-radius: 50%;
            width: 46px;
            height: 46px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 12px rgba(99,102,241,0.13);
            font-size: 1.3rem;
        }
        .chat-input button:hover {
            transform: scale(1.09);
            background: linear-gradient(135deg, #7f53ac 60%, #6366f1 100%);
            box-shadow: 0 4px 18px rgba(99,102,241,0.18);
        }
        .message-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--color-danger);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: bold;
        }
        .messages-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-height: 400px;
            overflow-y: auto;
        }
        .message-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
        }
        .message-sender {
            font-weight: bold;
            color: var(--color-dark);
        }
        .message-time {
            font-size: 0.8rem;
            color: var(--color-dark-variant);
        }
        .message-preview {
            color: var(--color-dark-variant);
            font-size: 0.9rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .message-item.unread {
            background: rgba(var(--color-primary-rgb), 0.1);
        }
        .message-item.unread .message-sender {
            color: var(--color-primary);
        }
        .task-type-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.4rem 8px;
            border-radius: 0.5rem;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            /* margin-left: 1.2rem; */
        }
        .task-type-badge.ders {
            background: rgba(var(--color-primary-rgb), 0.1);
            color: var(--color-primary);
        }
        .task-type-badge.deneme {
            background: rgba(var(--color-success-rgb), 0.1);
            color: var(--color-success);
        }
        .task-details {
            display: flex;
            flex-direction: column;
            gap: 0.7rem;
            margin: 0.5rem 0;
            padding: 0.8rem 8px;
            background: var(--color-light);
            border-radius: 1rem;
        }
        .detail-item {
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }
        .detail-item span {
            font-size: 1.15rem;
            color: var(--color-dark-variant);
        }
        .detail-item p {
            font-size: 0.98rem;
            color: var(--color-dark);
            margin: 0;
        }
        .task-description {
            margin-top: 0.5rem;
            padding-top: 0.5rem;
            border-top: 1px solid var(--color-light);
        }
        .task-description p {
            color: var(--color-dark-variant);
            font-size: 0.98rem;
            line-height: 1.6;
        }
        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.8rem;
            padding: 1rem;
        }
        .profile-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--color-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 300ms ease;
        }
        .profile-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .profile-icon span {
            font-size: 28px;
            color: white;
        }
        .info {
            text-align: center;
        }
        .info p {
            margin: 0;
            font-size: 1.1rem;
        }
        .task-notes {
            margin-top: 1rem;
            padding: 1rem;
            background: var(--color-light);
            border-radius: 0.7rem;
        }
        .notes-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.8rem;
        }
        .notes-header h4 {
            color: var(--color-dark);
            font-size: 1rem;
            margin: 0;
        }
        .add-note-btn {
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 300ms ease;
        }
        .add-note-btn:hover {
            transform: scale(1.1);
        }
        .add-note-btn span {
            font-size: 16px;
        }
        .notes-content {
            color: var(--color-dark-variant);
            font-size: 0.9rem;
            line-height: 1.4;
        }
        .no-notes {
            color: var(--color-dark-variant);
            font-style: italic;
        }
        .note-modal {
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
        .note-modal.active {
            display: flex;
        }
        .note-modal-content {
            background: var(--color-white);
            padding: 2rem;
            border-radius: 1rem;
            width: 90%;
            max-width: 500px;
        }
        .note-modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .note-modal-header h3 {
            margin: 0;
            color: var(--color-dark);
        }
        .note-modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--color-dark);
        }
        .tasks-section {
            background: transparent !important;
            box-shadow: none !important;
            border-radius: 0;
            padding: 0 0 2rem 0;
        }
        .tasks-section h1 {
            color: var(--color-dark);
            margin-bottom: 1.5rem;
            font-size: 1.6rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }
        .tasks-section h1::before {
            content: '';
            display: block;
            width: 4px;
            height: 24px;
            background: var(--color-primary);
            border-radius: 2px;
        }
        .completed-tasks h1::before {
            background: var(--color-success);
        }
        .completed-tasks .task-card {
            background: rgba(0, 255, 0, 0.02);
            border: 1px solid rgba(0, 255, 0, 0.1);
        }
        .completed-tasks .task-card::before {
            background: var(--color-success);
        }
        .completed-tasks .task-card .completion-status {
            color: var(--color-success);
            font-weight: 500;
        }
        .completed-tasks .empty-state span {
            color: var(--color-success);
        }
        @media screen and (max-width: 768px) {
            .tasks-section {
                margin-bottom: 2rem;
            }
            .tasks-section h1 {
                font-size: 1.4rem;
            }
        }
        .btn-edit-analiz {
            background: linear-gradient(90deg, #6366f1 0%, #7f53ac 100%);
            border: none;
            color: #fff;
            border-radius: 1.5rem;
            padding: 0.5rem 1.6rem;
            font-size: 1.05rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 16px rgba(99,102,241,0.10);
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s, color 0.2s;
            cursor: pointer;
            outline: none;
            margin-left: 12px;
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-edit-analiz:hover, .btn-edit-analiz:focus {
            background: linear-gradient(90deg, #7f53ac 0%, #6366f1 100%);
            color: #fff;
            box-shadow: 0 6px 24px rgba(99,102,241,0.18);
            transform: translateY(-2px) scale(1.05);
        }
        .navbar a,
        .navbar a h3,
        .navbar a span {
            text-decoration: none !important;
            border-bottom: none !important;
            box-shadow: none !important;
        }
        .navbar a.active {
            background: #6366f1;
            color: #fff !important;
            border-radius: 0.7rem;
            box-shadow: 0 2px 8px rgba(99,102,241,0.08);
            padding: 0.5rem 1.2rem;
            font-weight: 600;
            transition: background 0.2s, color 0.2s;
        }
        .navbar a.active h3,
        .navbar a.active span {
            color: #fff !important;
        }
        .card-content h3,
        .card-content p,
        .task-details {
            /* margin-left: 1.2rem; */
        }
        .due-date {
            margin-right: 1.2rem;
        }
        .status-icon {
            margin-right: 0.7rem;
        }
        body.dark-mode .modal-content {
            background: #23243a;
            color: #f3f4f6;
        }
        body.dark-mode .modal-content h2,
        body.dark-mode .modal-content label {
            color: #f3f4f6;
        }
        body.dark-mode .form-control {
            background: #2d2e4a;
            color: #f3f4f6;
            border: 1px solid #44456a;
        }
        body.dark-mode .form-control::placeholder {
            color: #bfc2d4;
            opacity: 1;
        }
        body.dark-mode .btn-submit {
            background: #6366f1;
            color: #fff;
        }
        body.dark-mode #editAnalizModal .modal-content {
            background: #23243a !important;
            color: #e0e3ef !important;
            border-radius: 16px !important;
            box-shadow: 0 8px 32px rgba(0,0,0,0.45);
            border: 1.5px solid #35365a;
        }
        body.dark-mode #editAnalizModal .modal-content h2,
        body.dark-mode #editAnalizModal .modal-content label {
            color: #e0e3ef !important;
            font-weight: 600;
            letter-spacing: 0.2px;
        }
        body.dark-mode #editAnalizModal .form-control {
            background: #2d2e4a !important;
            color: #e0e3ef !important;
            border: 1.5px solid #35365a !important;
            border-radius: 8px !important;
            font-size: 1.05rem;
            font-weight: 500;
            box-shadow: none;
            transition: border-color 0.2s;
        }
        body.dark-mode #editAnalizModal .form-control:focus {
            border-color: #6366f1 !important;
            background: #23243a !important;
            color: #fff !important;
        }
        body.dark-mode #editAnalizModal .form-control::placeholder {
            color: #bfc2d4 !important;
            opacity: 1;
        }
        body.dark-mode #editAnalizModal .btn-submit {
            background: linear-gradient(90deg, #6366f1 0%, #4f46e5 100%) !important;
            color: #fff !important;
            font-weight: 600;
            border-radius: 8px !important;
            border: none;
            box-shadow: 0 2px 8px rgba(99,102,241,0.08);
            letter-spacing: 0.5px;
            transition: background 0.2s, box-shadow 0.2s, transform 0.1s;
        }
        body.dark-mode #editAnalizModal .btn-submit:hover {
            background: linear-gradient(90deg, #4f46e5 0%, #6366f1 100%) !important;
            color: #fff !important;
            transform: translateY(-2px) scale(1.04);
        }
        body.dark-mode #editAnalizModal .material-icons-sharp {
            color: #bfc2d4 !important;
            opacity: 0.8;
        }
        .collapsible-card {
            position: relative;
            margin-bottom: 1rem;
            border-radius: 1rem;
            box-shadow: 0 2px 8px 0 rgba(99,102,241,0.06);
            background: var(--color-success-light, #e6f9ed);
            transition: box-shadow 0.2s;
        }
        .collapsible-card .collapse-toggle {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255,255,255,0.7);
            border: none;
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 1px 4px 0 rgba(99,102,241,0.08);
            transition: background 0.2s;
            z-index: 2;
        }
        .collapsible-card .collapse-toggle:hover {
            background: var(--color-primary, #6366f1);
            color: #fff;
        }
        .collapsible-card .collapse-toggle .material-icons-sharp {
            font-size: 1.5rem;
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        .collapsible-content {
            padding-top: 2.5rem;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        @media (max-width: 600px) {
            .collapsible-card { padding: 0.5rem; }
            .collapsible-card .collapse-toggle { top: 0.5rem; right: 0.5rem; }
            .collapsible-content { padding-top: 2rem; }
        }
        .navbar form[action*="logout"] button:hover {
            background: rgba(99,102,241,0.08);
            color: #6366f1 !important;
        }
        .navbar form[action*="logout"] button:active {
            background: rgba(99,102,241,0.16);
        }
        .navbar form[action*="logout"] button span.material-icons-sharp {
            color: inherit !important;
            transition: color 0.2s;
        }
        body.dark-mode .chat-panel {
            background: rgba(35,36,58,0.92);
            color: #f3f4f6;
            border: 1.5px solid #35365a;
        }
        body.dark-mode .chat-header {
            background: linear-gradient(90deg, #35365a 0%, #6366f1 100%);
            color: #fff;
        }
        body.dark-mode .chat-title,
        body.dark-mode .chat-icon {
            color: #fff;
        }
        body.dark-mode .close-button {
            background: rgba(99,102,241,0.13);
            color: #fff;
        }
        body.dark-mode .close-button:hover {
            background: rgba(99,102,241,0.22);
        }
        body.dark-mode .chat-messages {
            background: linear-gradient(135deg, #23243a 60%, #35365a 100%);
        }
        body.dark-mode .message.sent {
            background: linear-gradient(120deg, #35365a 60%, #6366f1 100%);
            color: #fff;
            border: 1.5px solid #6366f1;
        }
        body.dark-mode .message.received {
            background: linear-gradient(120deg, #23243a 60%, #35365a 100%);
            color: #f3f4f6;
            border: 1.5px solid #35365a;
        }
        body.dark-mode .message .content {
            color: #f3f4f6;
        }
        body.dark-mode .message .time {
            color: #bfc2d4;
        }
        body.dark-mode .chat-input {
            background: rgba(35,36,58,0.98);
            border-top: 1.5px solid #35365a;
        }
        body.dark-mode .chat-input input {
            background: #23243a;
            color: #f3f4f6;
            border: 1.5px solid #35365a;
        }
        body.dark-mode .chat-input input:focus {
            border: 1.5px solid #6366f1;
            background: #23243a;
            color: #fff;
        }
        body.dark-mode .chat-input button {
            background: linear-gradient(135deg, #6366f1 60%, #35365a 100%);
            color: #fff;
        }
        body.dark-mode .chat-input button:hover {
            background: linear-gradient(135deg, #35365a 60%, #6366f1 100%);
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
                    completed: !isCompleted,
                    _token: '{{ csrf_token() }}'
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Sunucu hatası');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Görevin durumunu güncelle
                    element.classList.toggle('completed');
                    const checkIcon = element.querySelector('.task-check');
                    const statusText = element.querySelector('.completion-status');
                    
                    const newCompleted = element.classList.contains('completed');
                    checkIcon.textContent = newCompleted ? 'check_circle' : 'check_circle_outline';
                    statusText.textContent = newCompleted ? 'Tamamlandı' : 'Devam Ediyor';

                    // Görevi uygun bölüme taşı
                    const sourceGrid = element.parentElement;
                    const targetGrid = newCompleted ? 
                        document.querySelector('.completed-tasks .tasks-grid') : 
                        document.querySelector('.tasks-section:not(.completed-tasks) .tasks-grid');

                    // Hedef bölümde boş durum mesajı varsa kaldır
                    const targetEmptyState = targetGrid.querySelector('.empty-state');
                    if (targetEmptyState) {
                        targetEmptyState.remove();
                    }

                    // Görevi yeni bölüme taşı
                    targetGrid.appendChild(element);

                    // Kaynak bölümde görev kalmadıysa boş durum mesajını göster
                    if (sourceGrid.children.length === 0) {
                        const isCompletedSection = sourceGrid.closest('.completed-tasks');
                        sourceGrid.innerHTML = `
                            <div class="empty-state">
                                <span class="material-icons-sharp">${isCompletedSection ? 'assignment_turned_in' : 'assignment_late'}</span>
                                <h2>Görev Bulunmadı</h2>
                                <p>Henüz ${isCompletedSection ? 'tamamlanmış' : 'devam eden'} bir göreviniz bulunmamaktadır.</p>
                            </div>
                        `;
                    }
                    
                    showNotification(data.message || 'Görev durumu güncellendi');
                } else {
                    throw new Error(data.message || 'Görev durumu güncellenirken bir hata oluştu');
                }
            })
            .catch(error => {
                console.error('Hata:', error);
                showNotification(error.message || 'Bir hata oluştu!', 'error');
            });
        }

        function checkEmptyStates() {
            // Devam eden görevler için boş durum kontrolü
            const ongoingTasksGrid = document.querySelector('.tasks-section:not(.completed-tasks) .tasks-grid');
            const ongoingTasks = ongoingTasksGrid.querySelectorAll('.task-card');
            
            if (ongoingTasks.length === 0) {
                ongoingTasksGrid.innerHTML = `
                    <div class="empty-state">
                        <span class="material-icons-sharp">assignment_late</span>
                        <h2>Görev Bulunmadı</h2>
                        <p>Henüz devam eden bir göreviniz bulunmamaktadır.</p>
                    </div>
                `;
            }

            // Tamamlanan görevler için boş durum kontrolü
            const completedTasksGrid = document.querySelector('.completed-tasks .tasks-grid');
            const completedTasks = completedTasksGrid.querySelectorAll('.task-card');
            
            if (completedTasks.length === 0) {
                completedTasksGrid.innerHTML = `
                    <div class="empty-state">
                        <span class="material-icons-sharp">assignment_turned_in</span>
                        <h2>Görev Bulunmadı</h2>
                        <p>Henüz tamamlanmış bir göreviniz bulunmamaktadır.</p>
                    </div>
                `;
            }
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

        let currentCoach = null;
        let unreadMessages = 0;

        // Sayfa yüklendiğinde koç bilgisini al
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/chat/coach')
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        currentCoach = data.coach;
                        loadMessages();
                    }
                });
        });

        function toggleChat() {
            const chatPanel = document.getElementById('chatPanel');
            chatPanel.classList.toggle('active');
            
            if (chatPanel.classList.contains('active')) {
                loadMessages();
                unreadMessages = 0;
                updateMessageBadge();
            }
        }

        function loadMessages() {
            if (!currentCoach) return;

            fetch(`/chat/history/${currentCoach.id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const messagesContainer = document.getElementById('messages');
                        messagesContainer.innerHTML = '';
                        
                        data.messages.forEach(message => {
                            const messageElement = createMessageElement(message);
                            messagesContainer.appendChild(messageElement);
                        });
                        
                        messagesContainer.scrollTop = messagesContainer.scrollHeight;
                        
                        // Mesajları okundu olarak işaretle
                        data.messages.forEach(message => {
                            if (!message.is_read && message.receiver_id === {{ Auth::id() }}) {
                                markMessageAsRead(message.id);
                            }
                        });
                    }
                });
        }

        function createMessageElement(message) {
            const div = document.createElement('div');
            div.className = `message ${message.sender_id === {{ Auth::id() }} ? 'sent' : 'received'}`;
            
            const time = new Date(message.created_at).toLocaleTimeString('tr-TR', {
                hour: '2-digit',
                minute: '2-digit'
            });
            
            div.innerHTML = `
                <div class="content">${message.content}</div>
                <div class="time">${time}</div>
            `;
            
            return div;
        }

        function sendMessage() {
            if (!currentCoach) return;
            
            const input = document.getElementById('messageInput');
            const content = input.value.trim();
            
            if (content) {
                fetch('/chat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        receiver_id: currentCoach.id,
                        content: content
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        input.value = '';
                        const messageElement = createMessageElement(data.message);
                        document.getElementById('messages').appendChild(messageElement);
                        document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
                        loadMessages();
                    }
                });
            }
        }

        function markMessageAsRead(messageId) {
            fetch(`/chat/messages/${messageId}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        }

        // Enter tuşu ile mesaj gönderme
        document.getElementById('messageInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Mesajları periyodik olarak güncelle
        setInterval(loadMessages, 5000);

        function updateMessageBadge() {
            const badge = document.getElementById('messageBadge');
            if (unreadMessages > 0) {
                badge.textContent = unreadMessages;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        }

        function createTaskElement(task) {
            const div = document.createElement('div');
            div.className = `task-card ${task.completed ? 'completed' : ''}`;
            div.setAttribute('data-task-id', task.id);
            div.onclick = function() { toggleTask(this); };

            const dueDate = new Date(task.due_date);
            const isOverdue = dueDate < new Date() && !task.completed;

            let taskTitle = task.title;
            if (!taskTitle) {
                if (task.task_type === 'ders') {
                    taskTitle = `${task.ders_type} - ${task.ders_konu}`;
                } else if (task.task_type === 'deneme') {
                    const denemeTypeText = task.deneme_type === 'tekders' ? 'Tek Ders Denemesi' : 'Genel Deneme';
                    taskTitle = task.deneme_ders ? `${denemeTypeText} - ${task.deneme_ders}` : denemeTypeText;
                }
            }

            let taskTypeBadge = '';
            let taskDetails = '';

            if (task.task_type === 'ders') {
                taskTypeBadge = `
                    <div class="task-type-badge ders">
                        <span class="material-icons-sharp">school</span>
                        Ders Görevi
                    </div>`;
                taskDetails = `
                    <div class="task-details">
                        <div class="detail-item">
                            <span class="material-icons-sharp">book</span>
                            <p>${task.ders_type ? task.ders_type.charAt(0).toUpperCase() + task.ders_type.slice(1) : ''}</p>
                        </div>
                        <div class="detail-item">
                            <span class="material-icons-sharp">subject</span>
                            <p>${task.ders_konu || ''}</p>
                        </div>
                    </div>`;
            } else {
                taskTypeBadge = `
                    <div class="task-type-badge deneme">
                        <span class="material-icons-sharp">assignment</span>
                        ${task.deneme_type === 'tekders' ? 'Tek Ders Denemesi' : 'Genel Deneme'}
                    </div>`;
                taskDetails = `
                    <div class="task-details">
                        ${task.deneme_type === 'tekders' ? `
                            <div class="detail-item">
                                <span class="material-icons-sharp">book</span>
                                <p>${task.deneme_ders ? task.deneme_ders.charAt(0).toUpperCase() + task.deneme_ders.slice(1) : ''}</p>
                            </div>
                        ` : ''}
                        <div class="detail-item">
                            <span class="material-icons-sharp">timer</span>
                            <p>${task.deneme_sure || ''} Dakika</p>
                        </div>
                    </div>`;
            }

            div.innerHTML = `
                <div class="card-status">
                    <div class="status-icon">
                        <span class="material-icons-sharp task-check">
                            ${task.completed ? 'check_circle' : 'check_circle_outline'}
                        </span>
                    </div>
                    <div class="due-date ${isOverdue ? 'overdue' : ''}">
                        <span class="material-icons-sharp">event</span>
                        ${dueDate.toLocaleDateString('tr-TR')}
                    </div>
                </div>
                <div class="card-content">
                    ${taskTypeBadge}
                    <h3>${taskTitle}</h3>
                    ${taskDetails}
                    <div class="task-description">
                        <p>${task.description || ''}</p>
                    </div>
                </div>
                <div class="card-footer">
                    @if($task->completed && !$task->approved)
                        <div class="completion-status waiting-approval">Koç Onayı Bekleniyor</div>
                    @elseif($task->completed && $task->approved)
                        <div class="completion-status completed">Koç Onayladı</div>
                    @else
                        <div class="completion-status">Devam Ediyor</div>
                    @endif
                </div>
            `;

            return div;
        }

        function getTimeAgo(date) {
            const now = new Date();
            const diff = now - date;
            
            const minutes = Math.floor(diff / 60000);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);
            
            if (days > 0) {
                return `${days} gün önce`;
            } else if (hours > 0) {
                return `${hours} saat önce`;
            } else {
                return `${minutes} dakika önce`;
            }
        }

        function showNoteModal(taskId) {
            const modal = document.getElementById('noteModal');
            const noteContent = document.getElementById('noteContent');
            const noteTaskId = document.getElementById('noteTaskId');
            
            // Mevcut notu getir
            const notesContent = document.getElementById(`notes-${taskId}`);
            const existingNote = notesContent.querySelector('p');
            if (existingNote && !existingNote.classList.contains('no-notes')) {
                noteContent.value = existingNote.textContent;
            } else {
                noteContent.value = '';
            }
            
            noteTaskId.value = taskId;
            modal.classList.add('active');
        }

        function hideNoteModal() {
            const modal = document.getElementById('noteModal');
            modal.classList.remove('active');
            document.getElementById('noteForm').reset();
        }

        function saveNote(event) {
            event.preventDefault();
            event.stopPropagation();
            
            const taskId = document.getElementById('noteTaskId').value;
            const content = document.getElementById('noteContent').value;
            
            // Eğer not boşsa, modalı kapat ve işlemi sonlandır
            if (!content.trim()) {
                hideNoteModal();
                return;
            }
            
            fetch(`{{ url('/tasks') }}/${taskId}/note`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    note: content,
                    _token: '{{ csrf_token() }}'
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const notesContent = document.getElementById(`notes-${taskId}`);
                    notesContent.innerHTML = `<p>${content}</p>`;
                    hideNoteModal();
                    showNotification('Not başarıyla eklendi!');
                }
            })
            .catch(error => {
                console.error('Hata:', error);
                showNotification('Not eklenirken bir hata oluştu!', 'error');
            });
        }

        // Kart tıklama fonksiyonunu güncelle
        const taskCards = document.querySelectorAll('.task-card');
        taskCards.forEach(card => {
            // Sadece tamamlanmamış görevlerde analiz modalı açılsın
            if (!card.classList.contains('completed')) {
                card.onclick = function() {
                    const taskId = this.getAttribute('data-task-id');
                    openAnalizModal(taskId);
                };
            } else {
                card.onclick = null;
            }
        });

        function openAnalizModal(taskId) {
            document.getElementById('analiz_task_id').value = taskId;
            document.getElementById('analizModal').style.display = 'flex';
        }
        function closeAnalizModal() {
            document.getElementById('analizModal').style.display = 'none';
            document.getElementById('analizForm').reset();
        }

        document.addEventListener('DOMContentLoaded', function() {
            var analizForm = document.getElementById('analizForm');
            if (analizForm) {
                analizForm.onsubmit = function(e) {
                    e.preventDefault();
                    const formData = new FormData(this);
                    var csrf = document.querySelector('meta[name="csrf-token"]');
                    if (!csrf) {
                        alert('CSRF token bulunamadı! Lütfen sayfanın <head> kısmında <meta name="csrf-token"> olduğundan emin olun.');
                        return;
                    }
                    fetch('/analiz-kaydet', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf.getAttribute('content')
                        },
                        body: formData
                    })
                    .then(res => res.json())
                    .then(data => {
                        if(data.success) {
                            closeAnalizModal();
                            location.reload();
                        } else {
                            alert(data.message || 'Bir hata oluştu!');
                        }
                    })
                    .catch(() => alert('Bir hata oluştu!'));
                };
            }
        });

        function openEditAnalizModal(taskId) {
            // Analiz verisini çek
            fetch('/analiz/' + taskId)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('edit_analiz_task_id').value = taskId;
                        document.getElementById('edit_dogru_sayisi').value = data.analiz.dogru_soru_sayisi;
                        document.getElementById('edit_yanlis_sayisi').value = data.analiz.yanlis_soru_sayisi;
                        document.getElementById('edit_bos_sayisi').value = data.analiz.bos_soru_sayisi;
                        document.getElementById('edit_sure').value = data.analiz.dakika;
                        document.getElementById('edit_ders_type').value = data.analiz.ders_type || '';
                        document.getElementById('editAnalizModal').style.display = 'flex';
                    } else {
                        alert(data.message || 'Analiz verisi bulunamadı!');
                    }
                })
                .catch(() => alert('Analiz verisi alınırken hata oluştu!'));
        }

        function closeEditAnalizModal() {
            document.getElementById('editAnalizModal').style.display = 'none';
            document.getElementById('editAnalizForm').reset();
        }

        document.getElementById('editAnalizForm').onsubmit = function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            var csrf = document.querySelector('meta[name="csrf-token"]');
            if (!csrf) {
                alert('CSRF token bulunamadı!');
                return;
            }
            fetch('/analiz-guncelle', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf.getAttribute('content')
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if(data.success) {
                    closeEditAnalizModal();
                    location.reload();
                } else {
                    if (data.errors) {
                        alert(Object.values(data.errors).join('\n'));
                    } else {
                        alert(data.message || 'Bir hata oluştu!');
                    }
                }
            })
            .catch((err) => {
                alert('Bir hata oluştu!\n' + err);
            });
        };

        document.querySelectorAll('.theme-toggler span').forEach(btn => {
            btn.onclick = function() {
                document.body.classList.toggle('dark-mode');
                // Aktif butonu vurgula
                document.querySelectorAll('.theme-toggler span').forEach(s => s.classList.remove('active'));
                if(document.body.classList.contains('dark-mode')) {
                    document.querySelector('.theme-toggler .material-icons-sharp.dark_mode').classList.add('active');
                } else {
                    document.querySelector('.theme-toggler .material-icons-sharp.light_mode').classList.add('active');
                }
                // Tercihi localStorage'a kaydet
                localStorage.setItem('theme', document.body.classList.contains('dark-mode') ? 'dark' : 'light');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const theme = localStorage.getItem('theme');
            if(theme === 'dark') {
                document.body.classList.add('dark-mode');
                document.querySelector('.theme-toggler .material-icons-sharp.dark_mode').classList.add('active');
                document.querySelector('.theme-toggler .material-icons-sharp.light_mode').classList.remove('active');
            } else {
                document.body.classList.remove('dark-mode');
                document.querySelector('.theme-toggler .material-icons-sharp.light_mode').classList.add('active');
                document.querySelector('.theme-toggler .material-icons-sharp.dark_mode').classList.remove('active');
            }
        });

        function toggleCollapse(event, id) {
            event.stopPropagation();
            const card = document.querySelector(`.collapsible-card[data-task-id='${id}']`);
            const content = card.querySelector('.collapsible-content');
            const icon = card.querySelector('.collapse-toggle .material-icons-sharp');
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.style.transform = '';
            } else {
                content.style.maxHeight = content.scrollHeight + 'px';
                icon.style.transform = 'rotate(180deg)';
            }
        }
        window.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.collapsible-content').forEach(el => {
                el.style.overflow = 'hidden';
                el.style.transition = 'max-height 0.3s cubic-bezier(0.4,0,0.2,1)';
                el.style.maxHeight = '0';
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const wrapper = document.getElementById('completedTasksWrapper');
            const btn = document.getElementById('toggleCompletedTasks');
            const chevron = document.getElementById('completedChevron');
            let open = false;
            btn.addEventListener('click', function() {
                open = !open;
                if(open) {
                    wrapper.style.maxHeight = wrapper.scrollHeight + 'px';
                    chevron.style.transform = 'rotate(180deg)';
                } else {
                    wrapper.style.maxHeight = '0';
                    chevron.style.transform = '';
                }
            });
        });
    </script>
</body>
</html>