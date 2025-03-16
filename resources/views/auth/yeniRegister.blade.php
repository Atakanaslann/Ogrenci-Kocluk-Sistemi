<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kayıt Ol</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #6a0dad, #9b30ff); /* Mor tonları */
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      color: #fff;
    }
    .register-container {
      background: #2c003e; /* Koyu mor */
      padding: 40px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      color: white;
    }
    .register-container h2 {
      margin-bottom: 20px;
      font-size: 24px;
      font-weight: 600;
      text-align: center;
      border-bottom: 2px solid #6a0dad;
      padding-bottom: 10px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group input, .form-group select {
      width: 100%;
      padding: 12px;
      border: 2px solid #6a0dad;
      background: transparent;
      color: white;
      font-size: 16px;
      font-weight: 400;
      letter-spacing: 0.5px;
      transition: border-color 0.3s, color 0.3s;
    }
    .form-group select {
      background: #fff; /* Beyaz arka plan */
      color: #000; /* Siyah yazı rengi */
      font-weight: 500;
    }
    .form-group select:focus {
      border-color: #9b30ff;
      outline: none;
    }
    .form-group select option {
      background: #fff; /* Beyaz arka plan */
      color: #000; /* Siyah yazı rengi */
    }
    .form-group input:focus, .form-group select:focus {
      border-color: #9b30ff;
      outline: none;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #6a0dad;
      border: none;
      color: white;
      font-size: 16px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
    }
    button:hover {
      background: #9b30ff;
      transform: scale(1.05);
    }
    .links {
      margin-top: 20px;
      text-align: center;
    }
    .links a {
      text-decoration: none;
      color: #9b30ff;
      font-weight: 600;
      transition: color 0.3s;
    }
    .links a:hover {
      color: white;
    }
  </style>
</head>
<body>
  <div class="register-container">
    <h2>Kayıt Ol</h2>
    <form method="POST" action="{{route('account.processRegister')}}">
      @csrf
      <div class="form-group">
        <input type="text" name="name" placeholder="Adınız" class="form-control @error('email') is-invalid @enderror" required />
        @error('name')
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <input type="text" name="email" placeholder="E-posta" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" required />
        @error('email')
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Şifre" class="form-control @error('password') is-invalid @enderror" required />
        @error('password')
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>
      {{-- <div class="form-group">
        <select name="role" class="form-control @error('role') is-invalid @enderror" required>
          @error('role')
          <p class="invalid-feedback">{{$message}}</p>
          @enderror
          <option value="" disabled selected>Rol Seçin</option>
          <option value="student">Öğrenci</option>
          <option value="coach">Koç</option>
        </select>
      </div> --}}
      <button type="submit">Kayıt Ol</button>
    </form>
    <div class="links">
      <a href="{{url('login')}}">Zaten hesabınız var mı? Giriş Yap</a>
    </div>
  </div>
</body>
</html>
