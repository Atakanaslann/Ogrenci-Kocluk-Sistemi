<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">

    <style>
        body{
            overflow-y: auto;
            overflow-x: hidden;
            min-height: 100vh;
        }
        header{
            position: relative;
            z-index: 100;
        }
        main {
            padding-bottom: 2rem;
        }
        .exam{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            min-height: 80vh;
            width: 80%;
            margin: auto;
        }
        .content-navbar {
            background: var(--color-white);
            padding: 1.4rem;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
            margin: 1.8rem 0;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
        .content-navbar .nav-links {
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 1rem;
        }
        .content-navbar .nav-links a {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--color-dark);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .content-navbar .nav-links a:hover {
            background: var(--color-primary);
            color: var(--color-white);
        }
        .content-navbar .nav-links a.active {
            background: var(--color-primary);
            color: var(--color-white);
        }
        .content-navbar .nav-links span {
            font-size: 1.5rem;
            margin-bottom: 0.3rem;
        }
        .content-navbar .nav-links h3 {
            font-size: 0.9rem;
            font-weight: 500;
        }
        .tab-content {
            display: none;
            background: var(--color-white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--box-shadow);
            width: 80%;
            margin: 1rem auto;
        }
        .tab-content.active {
            display: block;
        }
        .works-grid, .tasks-grid, .books-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            padding: 1rem;
        }
        .work-card, .task-card, .book-card {
            background: var(--color-background);
            padding: 1.5rem;
            border-radius: 0.8rem;
            box-shadow: var(--box-shadow);
        }
        .add-work-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--color-dark);
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--color-light);
            border-radius: 0.5rem;
            background: var(--color-background);
        }
        .form-group select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid var(--color-light);
            border-radius: 0.5rem;
            background: var(--color-background);
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .form-group select:hover {
            border-color: var(--color-primary);
        }
        .form-group select:focus {
            outline: none;
            border-color: var(--color-primary);
            box-shadow: 0 0 0 2px rgba(var(--color-primary-rgb), 0.1);
        }
        .form-group select option {
            padding: 0.8rem;
            background: var(--color-white);
            color: var(--color-dark);
        }
        .btn-submit {
            background: var(--color-primary);
            color: var(--color-white);
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-submit:hover {
            opacity: 0.9;
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
            <a href="{{route('account.timeTable')}}" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Takvim</h3> 
            <a href="password.html">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a>
            <form method="POST" action="{{ route('account.logout') }}" style="display:flex;align-items:center;gap:0.5rem;margin-left:auto;">
                @csrf
                <button type="submit" style="background:transparent;border:none;padding:0 12px;height:48px;display:flex;align-items:center;color:#6c757d;font-weight:500;font-size:1.05rem;cursor:pointer;border-radius:0.7rem;transition:background 0.2s, color 0.2s;">
                    <span class="material-icons-sharp" style="font-size:1.6rem;margin-right:0.3rem;">logout</span>
                    <span style="font-size:1.08rem;">Çıkış Yap</span>
                </button>
            </form>
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
        <div class="content-navbar">
            <div class="nav-links">
                <a href="#" onclick="showTab('works')" class="active">
                    <span class="material-icons-sharp">work</span>
                    <h3>Çalışmalar</h3>
                </a>
                <a href="#" onclick="showTab('tasks')">
                    <span class="material-icons-sharp">task</span>
                    <h3>Görevlerim</h3>
                </a>
                <a href="#" onclick="showTab('add-work')">
                    <span class="material-icons-sharp">add_circle</span>
                    <h3>Çalışma Ekle</h3>
                </a>
                <a href="#" onclick="showTab('exams')">
                    <span class="material-icons-sharp">quiz</span>
                    <h3>Denemelerim</h3>
                </a>
                <a href="#" onclick="showTab('books')">
                    <span class="material-icons-sharp">book</span>
                    <h3>Kitaplarım</h3>
                </a>
            </div>
        </div>

        <!-- Çalışmalar Sekmesi -->
        <div id="works" class="tab-content active">
            <h2>Çalışmalarım</h2>
            <div class="works-grid">
                <div class="work-card">
                    <h3>Matematik Ödevi</h3>
                    <p>Türev ve İntegral Problemleri</p>
                    <span class="material-icons-sharp">description</span>
                </div>
                <div class="work-card">
                    <h3>Fizik Projesi</h3>
                    <p>Hareket Kanunları Sunumu</p>
                    <span class="material-icons-sharp">description</span>
                </div>
            </div>
        </div>

        <!-- Görevlerim Sekmesi -->
        <div id="tasks" class="tab-content">
            <h2>Görevlerim</h2>
            <div class="tasks-grid">
                <div class="task-card">
                    <h3>Ödev Teslimi</h3>
                    <p>Kimya Raporu - 25 Mayıs</p>
                    <span class="material-icons-sharp">assignment</span>
                </div>
                <div class="task-card">
                    <h3>Sunum Hazırlama</h3>
                    <p>Biyoloji Projesi - 30 Mayıs</p>
                    <span class="material-icons-sharp">assignment</span>
                </div>
            </div>
        </div>

        <!-- Çalışma Ekle Sekmesi -->
        <div id="add-work" class="tab-content">
            <h2>Yeni Çalışma Ekle</h2>
            <form class="add-work-form" onsubmit="addNewWork(event)">
                <div class="form-group">
                    <label>Başlık</label>
                    <input type="text" id="workTitle" placeholder="Çalışma başlığını girin" required>
                </div>
                <div class="form-group">
                    <label>Açıklama</label>
                    <textarea rows="4" id="workDescription" placeholder="Çalışma açıklamasını girin" required></textarea>
                </div>
                <div class="form-group">
                    <label>Dosya Yükle</label>
                    <input type="file" id="workFile">
                </div>
                <button type="submit" class="btn-submit">Kaydet</button>
            </form>
        </div>

        <!-- Denemelerim Sekmesi -->
        <div id="exams" class="tab-content">
            <h2>Denemelerim</h2>
            <form class="add-work-form" onsubmit="addNewExam(event)">
                <div class="form-group">
                    <label>Deneme Adı</label>
                    <input type="text" id="examName" placeholder="Örn: TYT Denemesi 1" required>
                </div>
                <div class="form-group">
                    <label>Ders</label>
                    <select id="examSubject" required>
                        <option value="" disabled selected>Ders Seçin</option>
                        <option value="Matematik">Matematik</option>
                        <option value="Fizik">Fizik</option>
                        <option value="Kimya">Kimya</option>
                        <option value="Biyoloji">Biyoloji</option>
                        <option value="Türkçe">Türkçe</option>
                        <option value="Tarih">Tarih</option>
                        <option value="Coğrafya">Coğrafya</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Doğru Sayısı</label>
                    <input type="number" id="correctCount" min="0" onchange="calculateTotal()" required>
                </div>
                <div class="form-group">
                    <label>Yanlış Sayısı</label>
                    <input type="number" id="wrongCount" min="0" onchange="calculateTotal()" required>
                </div>
                <div class="form-group">
                    <label>Boş Sayısı</label>
                    <input type="number" id="emptyCount" min="0" onchange="calculateTotal()" required>
                </div>
                <div class="form-group">
                    <label>Toplam Soru Sayısı</label>
                    <input type="number" id="totalQuestions" readonly>
                </div>
                <div class="form-group">
                    <label>Notlar</label>
                    <textarea rows="4" id="examNotes" placeholder="Deneme hakkında notlarınızı buraya yazabilirsiniz"></textarea>
                </div>
                <button type="submit" class="btn-submit">Deneme Sonucunu Kaydet</button>
            </form>
        </div>

        <!-- Kitaplarım Sekmesi -->
        <div id="books" class="tab-content">
            <h2>Kitaplarım</h2>
            <div class="books-grid">
                <div class="book-card">
                    <h3>Matematik</h3>
                    <p>Analiz ve Cebir</p>
                    <span class="material-icons-sharp">menu_book</span>
                </div>
                <div class="book-card">
                    <h3>Fizik</h3>
                    <p>Mekanik ve Elektrik</p>
                    <span class="material-icons-sharp">menu_book</span>
                </div>
            </div>
        </div>

        
    </main>
    </main>

</body>

<script src="{{url('js/app.js')}}"></script>
<script>
function showTab(tabId) {
    // Tüm sekmeleri gizle
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Tüm navbar linklerinden active sınıfını kaldır
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.classList.remove('active');
    });
    
    // Seçilen sekmeyi göster
    document.getElementById(tabId).classList.add('active');
    
    // Seçilen navbar linkine active sınıfını ekle
    event.currentTarget.classList.add('active');
}

function addNewWork(event) {
    event.preventDefault();
    
    // Form verilerini al
    const title = document.getElementById('workTitle').value;
    const description = document.getElementById('workDescription').value;
    const file = document.getElementById('workFile').files[0];
    
    // Yeni çalışma kartı oluştur
    const newWorkCard = document.createElement('div');
    newWorkCard.className = 'work-card';
    newWorkCard.innerHTML = `
        <h3>${title}</h3>
        <p>${description}</p>
        <span class="material-icons-sharp">description</span>
    `;
    
    // Çalışmalar grid'ine yeni kartı ekle
    const worksGrid = document.querySelector('.works-grid');
    worksGrid.insertBefore(newWorkCard, worksGrid.firstChild);
    
    // Formu temizle
    event.target.reset();
    
    // Çalışmalar sekmesine geç
    showTab('works');
    
    // Başarılı mesajı göster
    alert('Çalışma başarıyla eklendi!');
}

function calculateTotal() {
    const correct = parseInt(document.getElementById('correctCount').value) || 0;
    const wrong = parseInt(document.getElementById('wrongCount').value) || 0;
    const empty = parseInt(document.getElementById('emptyCount').value) || 0;
    
    const total = correct + wrong + empty;
    document.getElementById('totalQuestions').value = total;
}

function addNewExam(event) {
    event.preventDefault();
    
    // Form verilerini al
    const examName = document.getElementById('examName').value;
    const subject = document.getElementById('examSubject').value;
    const correct = parseInt(document.getElementById('correctCount').value);
    const wrong = parseInt(document.getElementById('wrongCount').value);
    const empty = parseInt(document.getElementById('emptyCount').value);
    const total = parseInt(document.getElementById('totalQuestions').value);
    const notes = document.getElementById('examNotes').value;
    
    // Yeni çalışma kartı oluştur
    const newWorkCard = document.createElement('div');
    newWorkCard.className = 'work-card';
    newWorkCard.innerHTML = `
        <h3>${examName} - ${subject}</h3>
        <p>Doğru: ${correct} | Yanlış: ${wrong} | Boş: ${empty}</p>
        <p>Toplam Soru: ${total}</p>
        <p>${notes}</p>
        <span class="material-icons-sharp">quiz</span>
    `;
    
    // Çalışmalar grid'ine yeni kartı ekle
    const worksGrid = document.querySelector('.works-grid');
    worksGrid.insertBefore(newWorkCard, worksGrid.firstChild);
    
    // Formu temizle
    event.target.reset();
    
    // Çalışmalar sekmesine geç
    showTab('works');
    
    // Başarılı mesajı göster
    alert('Deneme sonucu başarıyla kaydedildi!');
}

// Sayfa yüklendiğinde toplam soru sayısını hesapla
document.addEventListener('DOMContentLoaded', calculateTotal);
</script>
</html>