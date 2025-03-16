<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giriş Yap</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


  @if (Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif

  @if (Session::has('error'))
    <div class="alert alert-danger">{{Session::get('error')}}</div>
  @endif


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
    .login-container {
      background: #2c003e; /* Koyu mor */
      padding: 40px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      color: white;
    }
    .login-container h2 {
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
    .form-group input {
      width: 100%;
      padding: 12px;
      border: 2px solid #6a0dad;
      background: transparent;
      color: white;
      font-size: 16px;
      font-weight: 400;
      letter-spacing: 0.5px;
      transition: border-color 0.3s;
    }
    .form-group input:focus {
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
    .social-login {
      margin-top: 20px;
    }
    .social-login button {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      background: transparent;
      border: 2px solid white;
      color: white;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s;
    }
    .social-login button:hover {
      background: white;
      color: #6a0dad;
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
  
  <div class="login-container">
    <h2>Giriş Yap</h2>
    <form method="POST" action="{{route('account.authenticate')}}">
      @csrf
      <div class="form-group">
        <input type="text" name="email" value='{{old('email')}}' placeholder="E-posta" class="form-control @error('email') is-valid @enderror"/>
        @error('email')
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Şifre" class="form-control @error('password') is-valid @enderror"/>
        @error('password')
          <p class="invalid-feedback">{{$message}}</p>
        @enderror
      </div>
      <button type="submit">Giriş Yap</button>
    </form>
    <div class="links">
      <a href="{{url('/')}}">Anasayfa</a> | 
      <a href="{{route('account.register')}}">Kayıt Ol</a>
    </div>
  </div>
</body>
</html>
