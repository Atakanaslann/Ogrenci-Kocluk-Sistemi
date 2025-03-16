<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Öğrenci Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: #f5f5f5;
    }

    header {
      background: #6a0dad;
      color: white;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    header h1 {
      font-size: 24px;
      font-weight: 600;
    }

    header .right-section {
      display: flex;
      align-items: center;
    }

    header nav a {
      text-decoration: none;
      color: #fff;
      margin-left: 20px;
      font-weight: 500;
      transition: color 0.3s;
    }

    header nav a:hover {
      color: #ffd700;
    }

    .date-display {
      background: #8e44ad;
      padding: 8px 15px;
      border-radius: 5px;
      font-size: 14px;
      font-weight: 600;
      margin-right: 20px;
    }

    .dashboard-container {
      display: flex;
      flex-direction: column;
      padding: 40px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .welcome {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 40px;
      text-align: center;
    }

    .welcome h2 {
      margin: 0;
      font-size: 26px;
      color: #333;
      font-weight: 600;
    }

    .welcome p {
      margin-top: 10px;
      font-size: 16px;
      color: #555;
    }

    .dashboard-sections {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }

    .dashboard-card {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .dashboard-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .dashboard-card h3 {
      font-size: 22px;
      margin-bottom: 10px;
      color: #333;
    }

    .dashboard-card p {
      font-size: 14px;
      color: #555;
      margin-bottom: 20px;
    }

    .dashboard-card a {
      text-decoration: none;
      padding: 12px 20px;
      background: #6a0dad;
      color: white;
      font-weight: 600;
      border-radius: 5px;
      transition: background-color 0.3s, transform 0.2s;
    }

    .dashboard-card a:hover {
      background: #9b30ff;
      transform: scale(1.05);
    }

    footer {
      background: #6a0dad;
      color: #fff;
      text-align: center;
      padding: 15px;
      margin-top: 40px;
      font-size: 14px;
    }
    {
            background: linear-gradient(135deg, #6a1b9a, #8e44ad);
            font-family: 'Roboto', sans-serif;
            color: #fff;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background: #8e44ad;
            color: #fff;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 15px;
            border-bottom: 3px solid #6a1b9a;
        }

        .table {
            color: #333;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
        }

        .table th {
            background: #8e44ad;
            color: #fff;
            text-align: center;
            font-size: 0.9rem;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .btn-info {
            background: #6a1b9a;
            border: none;
            transition: background 0.3s ease;
            color: white;
        }

        .btn-info:hover {
            background: #8e44ad;
        }

        .btn-info:focus {
            box-shadow: 0 0 5px rgba(142, 68, 173, 0.5);
        }

        .btn-secondary {
            background: #ddd;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            color: #333;
            transition: background 0.3s ease, color 0.3s ease;
            margin-bottom: 15px;
        }

        .btn-secondary:hover {
            background: #bbb;
            color: #fff;
        }

        /* Grafik Alanı */
        .container {
            margin-top: 50px;
        }
  </style>
</head>
<body>
  <header>
    <h1>Öğrenci Anasayfa</h1>
    <div class="right-section">
      <div class="date-display">
        {{ strftime('%d %B %Y') }}
      </div>
      <nav>
        <a href="{{url('/')}}">Çıkış Yap</a>
      </nav>
    </div>
  </header>

  <div class="dashboard-container">
    <!-- Hoş Geldiniz Mesajı -->
    <div class="welcome">
      <h2>Hoş Geldiniz, {{Auth::user()->name}}</h2>
      <p>Bugün harika bir gün! Hedeflerinize odaklanmaya devam edin.</p>
    </div>
        <p>Koçunuz tarafından atanmış görevleri görüntüleyin ve tamamlayın.</p>

    <!-- Dashboard Bölümleri -->
    <div class="dashboard-sections">
      <!-- Dersler -->
      <div class="dashboard-card">
        <h3>Derslerim</h3>
        <p>Güncel derslerinizi görüntüleyin ve ilerlemenizi takip edin.</p>
        <a href="{{url('derslerim')}}">Derslerime Git</a>
      </div>
      
      <!-- Görevler -->
      <div class="dashboard-card">
        <h3>Görevler</h3>
        <p>Koçunuz tarafından atanmış görevleri görüntüleyin.</p>
        <a href="{{url('kitaplar')}}">Görevlerime Git</a>
      </div>

      <!-- Koç Bilgileri -->
      <div class="dashboard-card">
        <h3>Program Oluştur</h3>
        <p>Koçunuzla iletişim kurun ve destek alın.</p>
        <a href="{{url('calendar')}}">Program Oluştur</a>
      </div>

      <!-- Gelişim Raporu -->
      <div class="dashboard-card">
        <h3>Gelişim Raporu</h3>
        <p>Hedeflerinize ulaşmak için ilerlemenizi inceleyin.</p>
        <a href="">Raporumu Gör</a>
      </div>
    </div>
  </div>

  <footer>
    © 2025 Öğrenci Koçluk Sistemi. Tüm hakları saklıdır.
  </footer>
</body>
</html>
