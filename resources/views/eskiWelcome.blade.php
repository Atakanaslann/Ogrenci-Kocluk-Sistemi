<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Öğrenci Koçluk Sistemi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
  background: url('images/arka_foto.jpg') no-repeat center center fixed; /* Yerel klasörden arka plan fotoğrafı */
  background-size: cover; /* Fotoğrafın ekranı tam kaplaması */
  color: #fff;
}

    header {
      background: rgba(44, 0, 62, 0.8); /* Koyu mor ve opaklık */
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    header h1 {
      font-size: 24px;
      font-weight: 600;
      color: #fff;
    }

    header nav a {
      text-decoration: none;
      color: #fff;
      margin-left: 20px;
      font-weight: 500;
      transition: color 0.3s;
    }

    header nav a:hover {
      color: #9b30ff;
    }

    .hero-section {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 80vh;
      text-align: center;
      padding: 20px;
    }

    .hero-section h2 {
      font-size: 36px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .hero-section p {
      font-size: 18px;
      margin-bottom: 30px;
      max-width: 600px;
    }

    .hero-section .buttons a {
      text-decoration: none;
      padding: 12px 30px;
      margin: 0 10px;
      background: #6a0dad;
      color: white;
      font-weight: 600;
      text-transform: uppercase;
      border: 2px solid transparent;
      transition: background 0.3s, border-color 0.3s;
    }

    .hero-section .buttons a:hover {
      background: transparent;
      border-color: #6a0dad;
      color: #fff;
    }

    .features {
      padding: 50px 20px;
      text-align: center;
      background: #fff;
      color: #333;
    }

    .features h3 {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 20px;
    }

    .features p {
      font-size: 16px;
      margin-bottom: 40px;
    }

    .features .feature-list {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 30px;
    }

    .features .feature-item {
      background: #f4f4f4;
      padding: 20px;
      border: 1px solid #ddd;
      width: 250px;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .features .feature-item h4 {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 10px;
    }

    footer {
      background: #2c003e;
      color: #fff;
      text-align: center;
      padding: 10px;
      font-size: 14px;
    }

  </style>
</head>
<body>

  <header>
    <h1>Koçluk Sistemi</h1>
    <nav>
      <a href="{{url('login')}}">Giriş Yap</a>
      <a href="{{url('register')}}">Kayıt Ol</a>
    </nav>
  </header>

  <section class="hero-section">
    <h2>Öğrenci Koçluk Sistemine Hoş Geldiniz</h2>
    <p>
      Öğrencilerin gelişimini desteklemek ve koçlar ile verimli bir iletişim sağlamak için buradayız. Hedeflerinize birlikte ulaşalım!
    </p>
    <div class="buttons">
      <a href="{{url('login')}}">Giriş Yap</a>
      <a href="{{url('register')}}">Kayıt Ol</a>
    </div>
  </section>

  <section class="features">
    <h3>Neden Bizi Seçmelisiniz?</h3>
    <p>
      Sistemimiz, öğrencilere ve koçlara eşsiz bir deneyim sunmak için tasarlandı.
    </p>
    <div class="feature-list">
      <div class="feature-item">
        <h4>Kişiselleştirilmiş Planlar</h4>
        <p>Öğrencilerin ihtiyaçlarına göre özel planlar oluşturun.</p>
      </div>
      <div class="feature-item">
        <h4>Kolay İletişim</h4>
        <p>Koçlar ve öğrenciler arasında hızlı ve kolay iletişim.</p>
      </div>
      <div class="feature-item">
        <h4>Gelişim Takibi</h4>
        <p>Öğrencilerin performanslarını anlık olarak takip edin.</p>
      </div>
    </div>
  </section>

  <footer>
    © 2025 Öğrenci Koçluk Sistemi. Tüm hakları saklıdır.
  </footer>

</body>
</html>
