<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesajlarım</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/dashboard.css') }}">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
    <style>
        body {
            background: var(--color-background, #f6f6f9);
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
            color: var(--color-dark, #23243a);
            margin: 0;
        }
        .chat-wrapper {
            display: flex;
            flex-direction: column;
            height: 100vh;
            max-height: 100vh;
        }
        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 2rem;
            background: var(--color-white, #fff);
            border-bottom: 1px solid var(--color-light, #e5e7eb);
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }
        .logo img {
            width: 38px;
            height: 38px;
        }
        .logo h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #23243a;
            margin: 0;
        }
        .navbar {
            display: flex;
            align-items: center;
            gap: 2rem;
        }
        .navbar a {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.05rem;
            transition: color 0.2s;
        }
        .navbar a.active, .navbar a:hover {
            color: var(--color-primary, #3b82f6);
        }
        .chat-main {
            display: flex;
            flex: 1;
            min-height: 0;
            background: var(--color-background, #f6f6f9);
        }
        .chat-sidebar {
            width: 340px;
            background: var(--color-white, #fff);
            border-right: 1px solid var(--color-light, #e5e7eb);
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .chat-sidebar-header {
            padding: 1.2rem 1.5rem 1rem 1.5rem;
            border-bottom: 1px solid var(--color-light, #e5e7eb);
        }
        .chat-search {
            width: 100%;
            padding: 0.7rem 1rem;
            border-radius: 0.7rem;
            border: 1.5px solid var(--color-light, #e5e7eb);
            font-size: 1rem;
            background: var(--color-background, #f6f6f9);
            outline: none;
        }
        .chat-list {
            flex: 1;
            overflow-y: auto;
            padding: 0.5rem 0;
        }
        .chat-list-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            cursor: pointer;
            transition: background 0.2s;
            border-bottom: 1px solid var(--color-light, #f0f0f0);
        }
        .chat-list-item.active, .chat-list-item:hover {
            background: var(--color-light, #f0f4fa);
        }
        .chat-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #e0e7ef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #3b82f6;
            font-weight: 600;
        }
        .chat-info {
            flex: 1;
            min-width: 0;
        }
        .chat-info .chat-name {
            font-weight: 600;
            font-size: 1.08rem;
            color: #23243a;
            margin-bottom: 0.2rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .chat-info .chat-last {
            color: #6c757d;
            font-size: 0.97rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .chat-meta {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.3rem;
        }
        .chat-meta .chat-time {
            font-size: 0.85rem;
            color: #a3a3a3;
        }
        .chat-meta .chat-unread {
            background: var(--color-primary, #3b82f6);
            color: #fff;
            font-size: 0.8rem;
            border-radius: 1rem;
            padding: 0.1rem 0.7rem;
            font-weight: 600;
        }
        .chat-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100%;
            background: var(--color-background, #f6f6f9);
        }
        .chat-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem 2rem;
            background: var(--color-white, #fff);
            border-bottom: 1px solid var(--color-light, #e5e7eb);
        }
        .chat-header .chat-avatar {
            width: 40px;
            height: 40px;
            font-size: 1.2rem;
        }
        .chat-header .chat-name {
            font-weight: 600;
            font-size: 1.1rem;
            color: #23243a;
        }
        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 2rem 2rem 1.5rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
            background: var(--color-background, #f6f6f9);
        }
        .message {
            max-width: 60%;
            padding: 1rem 1.3rem;
            border-radius: 1.2rem;
            font-size: 1.05rem;
            line-height: 1.5;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            position: relative;
            word-break: break-word;
        }
        .message.sent {
            align-self: flex-end;
            background: linear-gradient(90deg, #3b82f6 60%, #60a5fa 100%);
            color: #fff;
            border-bottom-right-radius: 0.3rem;
        }
        .message.received {
            align-self: flex-start;
            background: #fff;
            color: #23243a;
            border-bottom-left-radius: 0.3rem;
            border: 1.5px solid #e5e7eb;
        }
        .message-time {
            font-size: 0.8rem;
            color: #a3a3a3;
            margin-top: 0.3rem;
            text-align: right;
        }
        .chat-input-area {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.2rem 2rem;
            background: var(--color-white, #fff);
            border-top: 1px solid var(--color-light, #e5e7eb);
        }
        .chat-input {
            flex: 1;
            padding: 1rem 1.2rem;
            border-radius: 1rem;
            border: 1.5px solid var(--color-light, #e5e7eb);
            font-size: 1.05rem;
            background: var(--color-background, #f6f6f9);
            outline: none;
        }
        .send-btn {
            background: var(--color-primary, #3b82f6);
            color: #fff;
            border: none;
            border-radius: 1rem;
            padding: 0.8rem 1.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .send-btn:hover {
            background: #2563eb;
        }
        @media (max-width: 900px) {
            .chat-sidebar {
                width: 90px;
                min-width: 90px;
            }
            .chat-sidebar-header, .chat-list-item {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
            .chat-list-item .chat-info {
                display: none;
            }
        }
        @media (max-width: 700px) {
            .chat-main {
                flex-direction: column;
            }
            .chat-sidebar {
                width: 100%;
                min-width: 0;
                border-right: none;
                border-bottom: 1px solid var(--color-light, #e5e7eb);
                height: auto;
                max-height: 200px;
            }
            .chat-content {
                min-height: 300px;
            }
        }
    </style>
</head>
<body>
<div class="chat-wrapper">
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
            <a href="{{route('account.timeTable')}}">
                <span class="material-icons-sharp">today</span>
                <h3>Kişisel Takvim</h3>
            </a>
            <a href="{{ route('account.messages') }}" class="active chat-link">
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
    </header>
    <div class="chat-main">
        <aside class="chat-sidebar">
            <div class="chat-sidebar-header">
                <input type="text" class="chat-search" placeholder="Kişi veya grup ara...">
            </div>
            <div class="chat-list">
                <!-- Kişi listesi dinamik olarak yüklenecek -->
            </div>
        </aside>
        <section class="chat-content">
            <div class="chat-header">
                <div class="chat-avatar"></div>
                <div class="chat-name"></div>
            </div>
            <div class="chat-messages">
                <!-- Mesajlar dinamik olarak yüklenecek -->
            </div>
            <form class="chat-input-area" autocomplete="off">
                <input type="text" class="chat-input" placeholder="Mesaj yaz..." required>
                <button type="submit" class="send-btn">
                    <span class="material-icons-sharp">send</span>
                </button>
            </form>
        </section>
    </div>
</div>
<script>
let currentUserId = null;
let currentUserName = '';

function loadContacts() {
    fetch('/chat/coach')
        .then(res => res.json())
        .then(data => {
            if (data.success && data.coach) {
                const coach = data.coach;
                currentUserId = coach.id;
                currentUserName = coach.name;
                renderContactList([coach]);
                loadMessages(coach.id, coach.name);
            }
        });
}

function renderContactList(contacts) {
    const list = document.querySelector('.chat-list');
    list.innerHTML = '';
    contacts.forEach(contact => {
        const item = document.createElement('div');
        item.className = 'chat-list-item active';
        item.innerHTML = `
            <div class="chat-avatar">${contact.name.charAt(0).toUpperCase()}</div>
            <div class="chat-info">
                <div class="chat-name">${contact.name}</div>
                <div class="chat-last"></div>
            </div>
            <div class="chat-meta"></div>
        `;
        item.onclick = () => {
            currentUserId = contact.id;
            currentUserName = contact.name;
            loadMessages(contact.id, contact.name);
        };
        list.appendChild(item);
    });
}

function loadMessages(userId, userName) {
    fetch(`/chat/history/${userId}`)
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                renderMessages(data.messages, userName);
            }
        });
}

function renderMessages(messages, userName) {
    const messagesDiv = document.querySelector('.chat-messages');
    messagesDiv.innerHTML = '';
    messages.forEach(msg => {
        const isSent = msg.sender_id === parseInt("{{ Auth::id() }}");
        const div = document.createElement('div');
        div.className = 'message ' + (isSent ? 'sent' : 'received');
        div.innerHTML = `
            ${msg.content}
            <div class="message-time">${new Date(msg.created_at).toLocaleTimeString('tr-TR', {hour:'2-digit',minute:'2-digit'})}</div>
        `;
        messagesDiv.appendChild(div);
    });
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
    // Header'ı güncelle
    document.querySelector('.chat-header .chat-avatar').textContent = userName.charAt(0).toUpperCase();
    document.querySelector('.chat-header .chat-name').textContent = userName;
}

document.querySelector('.chat-input-area').addEventListener('submit', function(e) {
    e.preventDefault();
    var input = this.querySelector('.chat-input');
    var text = input.value.trim();
    if(text && currentUserId) {
        fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                receiver_id: currentUserId,
                content: text
            })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                loadMessages(currentUserId, currentUserName);
                input.value = '';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    loadContacts();
    setInterval(() => {
        if(currentUserId) loadMessages(currentUserId, currentUserName);
    }, 5000);
});
</script>
</body>
</html> 