<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Koç Dashboard</title>
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
    <h1>Koç Anasayfa</h1>
    <nav>
      <a href="{{url('/')}}">Çıkış Yap</a>
    </nav>
  </header>
  <div class="dashboard-container">
    <!-- Hoş Geldiniz Mesajı -->
    <div class="welcome">
      <h2>Hoş Geldiniz, {{$getRecord->name}}</h2>
      <p>Bugün öğrencilerinizle birlikte büyük bir fark yaratabilirsiniz!</p>
    </div>
    <!-- Dashboard Bölümleri -->
    <div class="dashboard-sections">
      <!-- Öğrenci Yönetimi -->
      <div class="dashboard-card">
        <h3>Öğrenci Yönetimi</h3>
        <p>Öğrencilerinizi görüntüleyin, detayları düzenleyin ve yeni öğrenciler ekleyin.</p>
        <a href="{{url('ogrenciler')}}">Öğrencileri Yönet</a>
      </div>
      <!-- Görev Yönetimi -->
      <div class="dashboard-card">
        <h3>Görev Yönetimi</h3>
        <p>Öğrencilerinize görevler atayın ve tamamlanma durumlarını takip edin.</p>
        <a href="{{url('kitaplar/ekle')}}">Görevleri Yönet</a>
      </div>
      <!-- Raporlar -->
      <div class="dashboard-card">
        <h3>Raporlar</h3>
        <p>Öğrencilerinizin performans raporlarını inceleyin ve analiz edin.</p>
        <a href="">Raporları Gör</a>
      </div>
      <!-- Mesajlaşma -->
      <div class="dashboard-card">
        <h3>Mesajlaşma</h3>
        <p>Öğrencilerinizle doğrudan iletişim kurun ve sorularını yanıtlayın.</p>
        <a href="">Mesajlara Git</a>
      </div>
    </div>
  </div>
  <footer>
    © 2025 Öğrenci Koçluk Sistemi. Tüm hakları saklıdır.
  </footer>
</body>
</html>
