<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Koç Dashboard</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
</head>
<body>
    <header>
        <div class="logo" title="University Management System">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" alt="ATAY KOÇ Logo">
            <h2>A<span class="danger">T</span>AY KOÇ</h2>
        </div>
        <div class="navbar">
            <a href="{{route('coach.dashboard')}}" class="active">
                <span class="material-icons-sharp">home</span>
                <h3>Ana Menü</h3>
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
                    <div class="profile-photo">
                        <span class="material-icons-sharp">school</span>
                    </div>
                    <div class="info">
                        <h3>{{Auth::user()->name}}</h3>
                        
                    </div>
                </div>
                <div class="stats">
                    <div class="stat">
                        <div class="value">{{ $students->count() }}</div>
                        <div class="label">Öğrenci</div>
                    </div>
                </div>
                <div class="about">
                    <h5>
                        <span class="material-icons-sharp">mail</span>
                        İletişim Bilgileri
                    </h5>
                    <p>
                        <span class="material-icons-sharp">alternate_email</span>
                        {{Auth::user()->email}}
                    </p>
                </div>
            </div>
        </aside>

        <main>
            <h1>Öğrenci Yönetimi</h1>
            <div class="search-bar">
                <div class="search-input">
                    <span class="material-icons-sharp">search</span>
                    <input type="text" id="studentSearch" placeholder="Öğrenci ara...">
                </div>
            </div>
            <div class="students-grid" id="studentsGrid">
                @if($students->isEmpty())
                    <div class="empty-state">
                        <span class="material-icons-sharp">people</span>
                        <h2>Öğrenci Bulunmadı</h2>
                        <p>Henüz size atanmış öğrenci bulunmamaktadır.</p>
                    </div>
                @else
                    @foreach($students as $student)
                    <div class="student-card" data-student-name="{{ strtolower($student->name) }}">
                        <div class="student-header">
                            <div class="profile-photo">
                                <span class="material-icons-sharp">person</span>
                            </div>
                            <div class="student-info">
                                <h3>{{ $student->name }}</h3>
                                <p>{{ $student->email }}</p>
                            </div>
                        </div>
                        <div class="student-actions">
                            <button class="action-btn assign-task" onclick="showAssignTaskModal('{{ $student->id }}')">
                                <span class="material-icons-sharp">assignment_add</span>
                                Görev Ata
                            </button>
                            <button class="action-btn send-message" onclick="openChat('{{ $student->id }}')">
                                <span class="material-icons-sharp">chat</span>
                                Mesaj Gönder
                            </button>
                            <a href="{{ route('student.analysis', ['student_id' => $student->id]) }}" class="action-btn analysis-btn">
                                <span class="material-icons-sharp">bar_chart</span>
                                Analiz
                            </a>
                        </div>
                        <div class="student-tasks">
                            <h4>Son Görevler</h4>
                            @foreach($student->tasks()->latest()->take(5)->get() as $task)
                            <div class="mini-task {{ $task->completed ? ($task->approved ? 'completed' : 'pending-approval') : '' }}">
                                <span class="material-icons-sharp task-check">
                                    @if($task->completed)
                                        @if($task->approved)
                                            check_circle
                                        @else
                                            pending
                                        @endif
                                    @else
                                        check_circle_outline
                                    @endif
                                </span>
                                <span class="task-title">{{ $task->title }}</span>
                                @if($task->completed && !$task->approved)
                                    <span class="material-icons-sharp pending-icon" title="Onay Bekliyor">schedule</span>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </main>

        <div class="right">
            <div class="tasks-section">
                <h2>Onay Bekleyen Görevler</h2>
                <div class="tasks-list">
                    @forelse($tasks->where('completed', true)->where('approved', false) as $task)
                    <div class="task-item">
                        <div class="task-content">
                            <h3>{{ $task->title }}</h3>
                            <p>{{ $task->description }}</p>
                            <small>Öğrenci: {{ $task->student->name }}</small>
                            <small>Tamamlanma: {{ $task->completed_at ? $task->completed_at->format('d.m.Y H:i') : 'Henüz tamamlanmadı' }}</small>
                        </div>
                        <div class="task-actions">
                            <button class="action-btn approve-task" onclick="approveTask({{ $task->id }})">
                                <span class="material-icons-sharp">check_circle</span>
                                Onayla
                            </button>
                            <button class="action-btn reject-task" onclick="rejectTask({{ $task->id }})">
                                <span class="material-icons-sharp">cancel</span>
                                Reddet
                            </button>
                        </div>
                    </div>
                    @empty
                    <div class="empty-state">
                        <span class="material-icons-sharp">assignment</span>
                        <h3>Onay Bekleyen Görev Yok</h3>
                        <p>Şu anda onay bekleyen görev bulunmamaktadır.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="chat-modal" id="chatModal">
        <div class="chat-container">
            <div class="chat-header">
                <div class="chat-header-content">
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg" alt="Öğrenci Profili">
                    </div>
                    <h3>Öğrenci ile Sohbet</h3>
                </div>
                <span class="material-icons-sharp close-chat" onclick="closeChat()">close</span>
            </div>
            <div class="chat-messages" id="chatMessages">
                <!-- Mesajlar buraya gelecek -->
            </div>
            <div class="chat-input">
                <input type="text" id="messageInput" placeholder="Mesajınızı yazın...">
                <button onclick="sendMessage()">
                    <span class="material-icons-sharp">send</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Görev Atama Modalı -->
    <div class="task-modal" id="assignTaskModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Görev Ata</h2>
                <span class="material-icons-sharp modal-close" onclick="hideAssignTaskModal()">close</span>
            </div>
            <form id="assignTaskForm" onsubmit="assignTask(event)">
                <input type="hidden" id="studentId" name="student_id">
                
                <div class="form-group">
                    <label for="taskType">Görev Tipi</label>
                    <select id="taskType" name="task_type" required onchange="toggleTaskFields()">
                        <option value="">Görev tipini seçin</option>
                        <option value="ders">Ders</option>
                        <option value="deneme">Deneme</option>
                    </select>
                </div>

                <!-- Ders için alanlar -->
                <div id="dersFields" class="task-fields" style="display: none;">
                    <div class="form-group">
                        <label for="dersType">Ders Seçimi</label>
                        <select id="dersType" name="ders_type" onchange="fetchTopicsForSubject()">
                            <option value="">Ders seçin</option>
                            @foreach($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dersKonu">Konu Başlığı</label>
                        <select id="dersKonu" name="ders_konu">
                            <option value="">Önce ders seçin</option>
                        </select>
                    </div>
                </div>

                <!-- Deneme için alanlar -->
                <div id="denemeFields" class="task-fields" style="display: none;">
                    <div class="form-group">
                        <label for="denemeType">Deneme Tipi</label>
                        <select id="denemeType" name="deneme_type">
                            <option value="">Deneme tipini seçin</option>
                            <option value="tekders">Tek Ders Denemesi</option>
                            <option value="genel">Genel Deneme</option>
                        </select>
                    </div>
                    <div id="tekDersFields" class="sub-fields" style="display: none;">
                        <div class="form-group">
                            <label for="denemeDers">Deneme Dersi</label>
                            <select id="denemeDers" name="deneme_ders">
                                <option value="">Ders seçin</option>
                                <option value="turkce">Türkçe</option>
                                <option value="tarih">Tarih</option>
                                <option value="cografya">Coğrafya</option>
                                <option value="din">Din Kültürü</option>
                                <option value="felsefe">Felsefe</option>
                                <option value="matematik">Matematik</option>
                                <option value="geometri">Geometri</option>
                                <option value="kimya">Kimya</option>
                                <option value="fizik">Fizik</option>
                                <option value="biyoloji">Biyoloji</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="denemeSure">Süre (Dakika)</label>
                        <input type="number" id="denemeSure" name="deneme_sure" min="1" placeholder="Örn: 90">
                    </div>
                </div>

                <div class="form-group">
                    <label for="assignTaskDescription">Açıklama</label>
                    <textarea id="assignTaskDescription" name="description" required placeholder="Görev açıklaması..."></textarea>
                </div>

                <div class="form-group">
                    <label for="assignTaskDueDate">Son Tarih</label>
                    <input type="date" id="assignTaskDueDate" name="due_date" required>
                </div>

                <button type="submit" class="btn-submit">Görevi Ata</button>
            </form>
        </div>
    </div>

    <script src="{{url('js/timeTable.js')}}"></script>
    <script src="{{url('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function showAssignTaskModal(studentId) {
            document.getElementById('studentId').value = studentId;
            document.getElementById('assignTaskModal').classList.add('active');
        }

        function hideAssignTaskModal() {
            document.getElementById('assignTaskModal').classList.remove('active');
            document.getElementById('assignTaskForm').reset();
        }

        function toggleTaskFields() {
            const taskType = document.getElementById('taskType').value;
            const dersFields = document.getElementById('dersFields');
            const denemeFields = document.getElementById('denemeFields');
            const tekDersFields = document.getElementById('tekDersFields');
            
            // Tüm alanları gizle
            dersFields.style.display = 'none';
            denemeFields.style.display = 'none';
            tekDersFields.style.display = 'none';
            
            // Seçilen tipe göre alanları göster
            if (taskType === 'ders') {
                dersFields.style.display = 'block';
            } else if (taskType === 'deneme') {
                denemeFields.style.display = 'block';
                const denemeType = document.getElementById('denemeType').value;
                if (denemeType === 'tekders') {
                    tekDersFields.style.display = 'block';
                }
            }
        }

        // Deneme tipi değiştiğinde tetiklenecek fonksiyon
        document.getElementById('denemeType').addEventListener('change', function() {
            const tekDersFields = document.getElementById('tekDersFields');
            tekDersFields.style.display = this.value === 'tekders' ? 'block' : 'none';
            
            // Genel deneme seçildiğinde ders seçimini sıfırla
            if (this.value === 'genel') {
                document.getElementById('denemeDers').value = '';
            }
        });

        function assignTask(event) {
            event.preventDefault();
            if (!validateForm()) {
                return;
            }
            const taskType = document.getElementById('taskType').value;
            const denemeType = document.getElementById('denemeType').value;
            let title = '';
            let dersTypeValue = '';
            let dersTypeText = '';
            if (taskType === 'ders') {
                const dersTypeSelect = document.getElementById('dersType');
                dersTypeValue = dersTypeSelect.value;
                dersTypeText = dersTypeSelect.options[dersTypeSelect.selectedIndex].text;
                const dersKonu = document.getElementById('dersKonu').value;
                title = `${dersTypeText} - ${dersKonu}`;
            } else if (taskType === 'deneme') {
                const denemeTypeText = denemeType === 'tekders' ? 'Tek Ders Denemesi' : 'Genel Deneme';
                const denemeDers = denemeType === 'tekders' ? document.getElementById('denemeDers').value : '';
                title = denemeDers ? `${denemeTypeText} - ${denemeDers}` : denemeTypeText;
            }
            const formData = {
                student_id: document.getElementById('studentId').value,
                coach_id: '{{ Auth::id() }}',
                title: title,
                task_type: taskType,
                ders_type: taskType === 'ders' ? dersTypeText : null,
                ders_konu: taskType === 'ders' ? document.getElementById('dersKonu').value : null,
                deneme_type: taskType === 'deneme' ? denemeType : null,
                deneme_ders: taskType === 'deneme' && denemeType === 'tekders' ? document.getElementById('denemeDers').value : null,
                deneme_sure: taskType === 'deneme' ? parseInt(document.getElementById('denemeSure').value) || null : null,
                description: document.getElementById('assignTaskDescription').value,
                due_date: document.getElementById('assignTaskDueDate').value,
                _token: '{{ csrf_token() }}'
            };
            fetch('{{ route("tasks.assign") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(formData)
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || 'Sunucu hatası');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    hideAssignTaskModal();
                    showNotification('Görev başarıyla atandı!');
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    throw new Error(data.message || 'Görev atanırken bir hata oluştu');
                }
            })
            .catch(error => {
                console.error('Hata:', error);
                showNotification(error.message || 'Görev atanırken bir hata oluştu!', 'error');
            });
        }

        function validateForm() {
            const taskType = document.getElementById('taskType').value;
            
            if (!taskType) {
                showNotification('Lütfen görev tipini seçin', 'error');
                return false;
            }
            
            if (taskType === 'ders') {
                const dersType = document.getElementById('dersType').value;
                const dersKonu = document.getElementById('dersKonu').value;
                
                if (!dersType) {
                    showNotification('Lütfen ders seçin', 'error');
                    return false;
                }
                if (!dersKonu) {
                    showNotification('Lütfen konu başlığı girin', 'error');
                    return false;
                }
            } else if (taskType === 'deneme') {
                const denemeType = document.getElementById('denemeType').value;
                const denemeSure = document.getElementById('denemeSure').value;
                
                if (!denemeType) {
                    showNotification('Lütfen deneme tipini seçin', 'error');
                    return false;
                }
                if (denemeType === 'tekders' && !document.getElementById('denemeDers').value) {
                    showNotification('Lütfen deneme dersi seçin', 'error');
                    return false;
                }
                if (!denemeSure || isNaN(denemeSure) || parseInt(denemeSure) < 1) {
                    showNotification('Lütfen geçerli bir süre girin (en az 1 dakika)', 'error');
                    return false;
                }
            }

            const description = document.getElementById('assignTaskDescription').value;
            if (!description) {
                showNotification('Lütfen görev açıklaması girin', 'error');
                return false;
            }

            const dueDate = document.getElementById('assignTaskDueDate').value;
            if (!dueDate) {
                showNotification('Lütfen son tarih seçin', 'error');
                return false;
            }

            const today = new Date();
            today.setHours(0, 0, 0, 0);
            const selectedDate = new Date(dueDate);
            if (selectedDate <= today) {
                showNotification('Son tarih bugünden sonra olmalıdır', 'error');
                return false;
            }
            
            return true;
        }

        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `notification ${type}`;
            notification.textContent = message;
            
            // Eğer önceki bildirim varsa kaldır
            const existingNotification = document.querySelector('.notification');
            if (existingNotification) {
                existingNotification.remove();
            }

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
            notification.style.whiteSpace = 'pre-line';

            setTimeout(() => {
                notification.style.animation = 'slideOut 0.5s ease-out';
                setTimeout(() => {
                    notification.remove();
                }, 500);
            }, 5000);
        }

        let currentChatUserId = null;

        function openChat(userId) {
            currentChatUserId = userId;
            document.getElementById('chatModal').classList.add('active');
            loadMessages(userId);
            startMessageUpdates();
        }

        function closeChat() {
            document.getElementById('chatModal').classList.remove('active');
            currentChatUserId = null;
            stopMessageUpdates();
        }

        function loadMessages(userId) {
            if (!userId) return;

            fetch(`/chat/history/${userId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const messagesContainer = document.getElementById('chatMessages');
                        messagesContainer.innerHTML = '';
                        
                        // Mesajları tarihe göre sırala
                        data.messages.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
                        
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
                })
                .catch(error => {
                    console.error('Mesaj yükleme hatası:', error);
                });
        }

        function createMessageElement(message) {
            const div = document.createElement('div');
            const isSent = message.sender_id === {{ Auth::id() }};
            div.className = `message ${isSent ? 'sent' : 'received'}`;
            
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
            if (!currentChatUserId) return;
            
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
                        receiver_id: currentChatUserId,
                        content: content
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        input.value = '';
                        const messageElement = createMessageElement(data.message);
                        document.getElementById('chatMessages').appendChild(messageElement);
                        document.getElementById('chatMessages').scrollTop = document.getElementById('chatMessages').scrollHeight;
                        loadMessages(currentChatUserId);
                    }
                })
                .catch(error => {
                    console.error('Mesaj gönderme hatası:', error);
                });
            }
        }

        // Enter tuşu ile mesaj gönderme
        document.getElementById('messageInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        function markMessageAsRead(messageId) {
            fetch(`/chat/messages/${messageId}/read`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
        }

        // Mesajları periyodik olarak güncelle
        let messageUpdateInterval;

        function startMessageUpdates() {
            if (currentChatUserId) {
                messageUpdateInterval = setInterval(() => {
                    loadMessages(currentChatUserId);
                }, 5000);
            }
        }

        function stopMessageUpdates() {
            clearInterval(messageUpdateInterval);
        }

        // Öğrenci arama fonksiyonu
        document.getElementById('studentSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const studentCards = document.querySelectorAll('.student-card');
            
            studentCards.forEach(card => {
                const studentName = card.getAttribute('data-student-name');
                if (studentName.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });

            // Eğer hiç öğrenci görünmüyorsa "Öğrenci Bulunamadı" mesajını göster
            const visibleCards = document.querySelectorAll('.student-card[style="display: block;"]');
            const emptyState = document.querySelector('.empty-state');
            
            if (visibleCards.length === 0 && emptyState) {
                emptyState.style.display = 'block';
            } else if (emptyState) {
                emptyState.style.display = 'none';
            }
        });

        // Performans grafiği
        const ctx = document.getElementById('performanceChart').getContext('2d');
        const performanceData = {
            labels: {!! json_encode($students->pluck('name')) !!},
            datasets: [{
                label: 'Görev Tamamlama Oranı (%)',
                data: {!! json_encode($students->map(function($student) {
                    $totalTasks = $student->tasks()->count();
                    $completedTasks = $student->tasks()->where('completed', true)->count();
                    return $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;
                })) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        new Chart(ctx, {
            type: 'bar',
            data: performanceData,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });

        function approveTask(taskId) {
            if (confirm('Bu görevi onaylamak istediğinizden emin misiniz?')) {
                fetch(`/tasks/${taskId}/approve`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'Görev onaylanırken bir hata oluştu.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Bir hata oluştu. Lütfen tekrar deneyin.');
                });
            }
        }

        function rejectTask(taskId) {
            if (confirm('Bu görevi reddetmek istediğinizden emin misiniz?')) {
                fetch(`/tasks/${taskId}/reject`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert(data.message || 'Görev reddedilirken bir hata oluştu.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Bir hata oluştu. Lütfen tekrar deneyin.');
                });
            }
        }

        function fetchTopicsForSubject() {
            const subjectId = document.getElementById('dersType').value;
            const dersKonuSelect = document.getElementById('dersKonu');
            dersKonuSelect.innerHTML = '<option value="">Yükleniyor...</option>';
            if (!subjectId) {
                dersKonuSelect.innerHTML = '<option value="">Önce ders seçin</option>';
                return;
            }
            fetch(`/subjects/${subjectId}/topics`)
                .then(response => response.json())
                .then(data => {
                    if (data.length === 0) {
                        dersKonuSelect.innerHTML = '<option value="">Konu bulunamadı</option>';
                    } else {
                        dersKonuSelect.innerHTML = '<option value="">Konu seçin</option>';
                        data.forEach(topic => {
                            dersKonuSelect.innerHTML += `<option value="${topic.title}">${topic.title}</option>`;
                        });
                    }
                })
                .catch(() => {
                    dersKonuSelect.innerHTML = '<option value="">Konu yüklenemedi</option>';
                });
        }
    </script>

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
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-header h2 {
            color: var(--color-dark);
            margin: 0;
            font-size: 1.5rem;
        }

        .modal-close {
            cursor: pointer;
            color: var(--color-dark-variant);
            font-size: 1.5rem;
            padding: 0.5rem;
            transition: all 300ms ease;
        }

        .modal-close:hover {
            color: var(--color-danger);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--color-dark);
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--color-light);
            border-radius: 0.5rem;
            background: var(--color-background);
            font-size: 1rem;
            transition: all 300ms ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--color-primary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(54, 162, 235, 0.1);
        }

        .form-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .btn-submit {
            width: 100%;
            padding: 1rem;
            background: var(--color-primary);
            color: var(--color-white);
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 300ms ease;
        }

        .btn-submit:hover {
            opacity: 0.9;
            transform: translateY(-1px);
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

        .students-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 0.5rem;
        }

        .student-card {
            background: var(--color-white);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 300ms ease;
        }

        .student-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .student-header .profile-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            overflow: hidden;
        }

        .student-header .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .student-info h3 {
            color: var(--color-dark);
            margin-bottom: 0.3rem;
        }

        .student-info p {
            color: var(--color-dark-variant);
            font-size: 0.9rem;
        }

        .student-actions {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 300ms ease;
            font-size: 0.9rem;
            text-decoration: none;
            white-space: nowrap;
            justify-content: center;
            min-width: fit-content;
        }

        .assign-task {
            background: var(--color-primary);
            color: var(--color-white);
            flex: 2;
        }

        .send-message {
            background: var(--color-success);
            color: var(--color-white);
            flex: 2;
        }

        .analysis-btn {
            background: #6366f1;
            color: var(--color-white);
            flex: 1;
        }

        .action-btn:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .student-tasks {
            border-top: 1px solid var(--color-light);
            padding-top: 1rem;
            max-height: 200px;
            overflow-y: auto;
        }

        .student-tasks::-webkit-scrollbar {
            width: 6px;
        }

        .student-tasks::-webkit-scrollbar-track {
            background: var(--color-light);
            border-radius: 3px;
        }

        .student-tasks::-webkit-scrollbar-thumb {
            background: var(--color-dark-variant);
            border-radius: 3px;
        }

        .student-tasks::-webkit-scrollbar-thumb:hover {
            background: var(--color-dark);
        }

        .student-tasks h4 {
            color: var(--color-dark);
            margin-bottom: 0.5rem;
        }

        .mini-task {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem;
            background: var(--color-light);
            border-radius: 0.5rem;
            margin-bottom: 0.5rem;
            border-left: 3px solid transparent;
        }

        .mini-task.pending-approval {
            background: rgba(255, 193, 7, 0.1);
            border-left: 3px solid #ffc107;
        }

        .mini-task.pending-approval .task-check {
            color: #ffc107;
        }

        .pending-icon {
            color: #ffc107;
            font-size: 1.1rem;
            margin-left: auto;
        }

        .mini-task.completed {
            background: rgba(0, 255, 0, 0.1);
            border-left: 3px solid var(--color-success);
        }

        .task-title {
            font-size: 0.9rem;
            color: var(--color-dark-variant);
        }

        .chat-modal {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 350px;
            height: 500px;
            background: var(--color-white);
            border-radius: 1rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            z-index: 1000;
        }

        .chat-modal.active {
            display: block;
        }

        .chat-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .chat-header {
            padding: 1rem;
            background: var(--color-primary);
            color: white;
            border-radius: 1rem 1rem 0 0;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .chat-header-content {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .chat-header .profile-photo {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid white;
        }

        .chat-header .profile-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .chat-header h3 {
            margin: 0;
            font-size: 1.1rem;
        }

        .close-chat {
            cursor: pointer;
            color: white;
            font-size: 1.5rem;
            padding: 0.5rem;
        }

        .chat-messages {
            flex: 1;
            padding: 1rem;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            background: #f0f2f5;
        }

        .message {
            max-width: 85%;
            padding: 0.8rem 1rem;
            border-radius: 1rem;
            position: relative;
            word-wrap: break-word;
            margin: 0.2rem 0;
            box-shadow: 0 0.5px 1px rgba(0, 0, 0, 0.1);
        }

        .message.sent {
            align-self: flex-end;
            background: #dcf8c6;
            color: #000;
            border-bottom-right-radius: 0.3rem;
            margin-left: auto;
        }

        .message.received {
            align-self: flex-start;
            background: white;
            color: #000;
            border-bottom-left-radius: 0.3rem;
            margin-right: auto;
        }

        .message .content {
            margin-bottom: 0.3rem;
            line-height: 1.4;
            font-size: 0.95rem;
        }

        .message .time {
            font-size: 0.7rem;
            text-align: right;
            margin-top: 0.2rem;
        }

        .message.sent .time {
            color: #128c7e;
        }

        .message.received .time {
            color: #667781;
        }

        .chat-input {
            padding: 1rem;
            background: #f0f2f5;
            border-top: 1px solid #e9edef;
            display: flex;
            gap: 0.5rem;
            border-radius: 0 0 1rem 1rem;
        }

        .chat-input input {
            flex: 1;
            padding: 0.8rem;
            border: 1px solid #e9edef;
            border-radius: 1.5rem;
            font-size: 0.9rem;
            background: white;
        }

        .chat-input button {
            background: var(--color-primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .chat-input button:hover {
            transform: scale(1.05);
            background: #128c7e;
        }

        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            background: var(--color-success);
            color: var(--color-white);
            z-index: 1001;
            animation: slideIn 0.3s ease-out;
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

        .search-bar {
            margin-bottom: 2rem;
            width: 100%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .search-input {
            display: flex;
            align-items: center;
            background: var(--color-white);
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 300ms ease;
            border: 2px solid transparent;
        }

        .search-input:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .search-input:focus-within {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            border-color: var(--color-primary);
            transform: translateY(-2px);
        }

        .search-input span {
            color: var(--color-primary);
            margin-right: 1rem;
            font-size: 1.5rem;
        }

        .search-input input {
            width: 100%;
            border: none;
            background: none;
            font-size: 1.1rem;
            color: var(--color-dark);
            font-weight: 500;
        }

        .search-input input:focus {
            outline: none;
        }

        .search-input input::placeholder {
            color: var(--color-dark-variant);
            font-weight: 400;
            opacity: 0.7;
        }

        /* Arama sonuçları için animasyon */
        .student-card {
            transition: all 300ms ease;
        }

        .student-card[style*="display: none"] {
            opacity: 0;
            transform: scale(0.95);
        }

        .student-card[style*="display: block"] {
            opacity: 1;
            transform: scale(1);
        }

        /* Boş durum mesajı için stil */
        .empty-state {
            text-align: center;
            padding: 3rem;
            background: var(--color-white);
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
            animation: fadeIn 0.5s ease-out;
        }

        .empty-state span {
            font-size: 4rem;
            color: var(--color-dark-variant);
            margin-bottom: 1rem;
            display: block;
        }

        .empty-state h2 {
            color: var(--color-dark);
            margin-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .empty-state p {
            color: var(--color-dark-variant);
            font-size: 1.1rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive tasarım için medya sorguları */
        @media screen and (max-width: 768px) {
            .search-bar {
                max-width: 100%;
                padding: 0 1rem;
            }

            .search-input {
                padding: 0.8rem 1.2rem;
            }

            .search-input span {
                font-size: 1.3rem;
            }

            .search-input input {
                font-size: 1rem;
            }

            .modal-content {
                padding: 1.5rem;
                width: 95%;
            }

            .modal-header h2 {
                font-size: 1.3rem;
            }
        }

        .right {
            margin-top: 1rem;
            padding: 0 1rem;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .student-count-wrapper {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: -8rem;
        }

        .student-count-card {
            background: var(--color-white);
            border-radius: 1rem;
            padding: 1.8rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
        }

        .student-count-content {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            justify-content: center;
        }

        .student-count-content span {
            font-size: 3rem;
            color: var(--color-primary);
            background: rgba(54, 162, 235, 0.1);
            padding: 1.2rem;
            border-radius: 1rem;
        }

        .student-count-info h3 {
            font-size: 1.1rem;
            color: var(--color-dark-variant);
            margin-bottom: 0.5rem;
        }

        .student-count-info p {
            font-size: 2.2rem;
            font-weight: 600;
            color: var(--color-dark);
        }

        @media screen and (max-width: 768px) {
            .right {
                padding: 0 0.8rem;
            }

            .student-count-wrapper {
                margin-top: -4rem;
            }

            .student-count-card {
                padding: 1.5rem;
            }

            .student-count-content span {
                font-size: 2.5rem;
                padding: 1rem;
            }

            .student-count-info p {
                font-size: 2rem;
            }
        }

        .tasks-section {
            background: var(--color-white);
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .tasks-section h2 {
            color: var(--color-dark);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .tasks-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .task-item {
            background: var(--color-background);
            border-radius: 0.7rem;
            padding: 1rem;
            transition: all 300ms ease;
        }

        .task-content {
            margin-bottom: 1rem;
        }

        .task-content h3 {
            color: var(--color-dark);
            margin-bottom: 0.5rem;
            font-size: 1.1rem;
        }

        .task-content p {
            color: var(--color-dark-variant);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .task-content small {
            display: block;
            color: var(--color-dark-variant);
            font-size: 0.8rem;
            margin-bottom: 0.3rem;
        }

        .task-actions {
            display: flex;
            gap: 0.5rem;
        }

        .approve-task {
            background: var(--color-success);
            color: var(--color-white);
        }

        .reject-task {
            background: var(--color-danger);
            color: var(--color-white);
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--color-dark-variant);
        }

        .empty-state span {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .empty-state h3 {
            margin-bottom: 0.5rem;
            color: var(--color-dark);
        }

        .empty-state p {
            font-size: 0.9rem;
        }
    </style>
</body>
</html>