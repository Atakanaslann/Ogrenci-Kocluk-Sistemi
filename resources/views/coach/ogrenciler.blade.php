<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Öğrenciler Listesi</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: #f5f5f5; /* Arka plan açık gri */
    }

    header {
      background: #6a0dad; /* Mor */
      color: white;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    header h1 {
      font-size: 24px;
      font-weight: 600;
    }

    header nav a {
      text-decoration: none;
      color: #fff;
      margin-left: 20px;
      font-weight: 500;
      transition: color 0.3s;
    }

    header nav a:hover {
      color: #ffd700; /* Altın rengi */
    }

    .dashboard-container {
      display: flex;
      flex-direction: column;
      padding: 20px 40px;
    }

    .welcome {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .welcome h2 {
      margin: 0;
      font-size: 22px;
      color: #333;
    }

    .welcome p {
      margin-top: 10px;
      font-size: 16px;
      color: #555;
    }

    .table-container {
      background: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background: #6a0dad;
      color: white;
    }

    tr:hover {
      background: #f4f4f4;
    }

    footer {
      background: #6a0dad;
      color: #fff;
      text-align: center;
      padding: 10px;
      margin-top: 20px;
      font-size: 14px;
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
    

    <!-- Öğrenciler Listesi Tablosu -->
    <div class="table-container">
      <h3>Öğrenciler Listesi</h3>
      <table>
        <thead>
          <tr>
            <th>Ad</th>
            <th>Email</th>
            <th>Rol</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($students as $student)
            <tr>
              <td>{{ $student->name }}</td>
              <td>{{ $student->email }}</td>
              <td>{{ $student->role }}</td> <!-- veya is_student -->
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <footer>
    © 2025 Öğrenci Koçluk Sistemi. Tüm hakları saklıdır.
  </footer>

</body>
</html>
