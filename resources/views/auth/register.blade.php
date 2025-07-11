<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- REMIXICONS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <title>Kullanıcı Girişi ve Kayıt</title>
</head>
<body>
    <!-- SVG ŞEKLİ VE RESİM -->
    <svg class="login__blob" viewBox="0 0 566 840" xmlns="http://www.w3.org/2000/svg">
        <mask id="mask0" mask-type="alpha">
            <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
        </mask>
        <g mask="url(#mask0)">
            <path d="M342.407 73.6315C388.53 56.4007 394.378 17.3643 391.538 
            0H566V840H0C14.5385 834.991 100.266 804.436 77.2046 707.263C49.6393 
            591.11 115.306 518.927 176.468 488.873C363.385 397.026 156.98 302.824 
            167.945 179.32C173.46 117.209 284.755 95.1699 342.407 73.6315Z"/>
            <image class="login__img" href="{{ asset('images/ogrenci-kocu.jpg') }}"/>
        </g>
    </svg>

    <!-- LOGIN VE KAYIT FORMU -->
    <div class="login container grid" id="loginAccessRegister">
        <!-- Giriş Yap -->
        <div class="login__access">
            <h1 class="login__title">Giriş Yap</h1>
            <div class="login__area">
                <form method="POST" action="{{ route('account.authenticate') }}">
                    @csrf
                    <div class="login__content grid">
                        <div class="login__box">
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder=" " class="login__input">
                            <label for="email" class="login__label">Email</label>
                            <i class="ri-mail-fill login__icon"></i>
                        </div>
                        <div class="login__box">
                            <input type="password" name="password" id="password" required placeholder=" " class="login__input">
                            <label for="password" class="login__label">Şifre</label>
                            <i class="ri-eye-off-fill login__icon login__password" id="loginPassword"></i>
                        </div>
                    </div>
                    <a href="#" class="login__forgot">Şifremi unuttum?</a>
                    <button type="submit" class="login__button">Giriş Yap</button>
                </form>
                <p class="login__switch">
                    Bir hesabım yok?
                    <button id="loginButtonRegister">Kayıt Ol</button>
                </p>
            </div>
        </div>

        <!-- Kayıt Ol -->
        <div class="login__register">
            <h1 class="login__title">Kayıt Ol</h1>
            <div class="login__area">
              <form method="POST" action="{{route('account.processRegister')}}">
                    @csrf
                    <div class="login__content grid">
                        <div class="login__box">
                            <input type="text" id="name" name="name" required placeholder=" " class="login__input">
                            <label for="name" class="login__label">Ad Soyad</label>
                            <i class="ri-user-fill login__icon"></i>

                        </div>
                        <div class="login__box">
                            <input type="text" id="registerEmail" name="email" value="{{ old('email') }}" required placeholder=" " class="login__input">
                            <label for="registerEmail" class="login__label">Email</label>
                            <i class="ri-mail-fill login__icon"></i>
                        </div>

                        <div class="login__box">
                            <input type="password" name="password" id="passwordCreate" required placeholder=" " class="login__input">
                            <label for="passwordCreate" class="login__label">Şifre</label>
                            <i class="ri-eye-off-fill login__icon login__password" id="loginPasswordCreate"></i>
                        </div>

                    </div>
                    <button type="submit" class="login__button">Kayıt Ol</button>
                </form>
                <p class="login__switch">
                    Zaten bir hesabım var?
                    <button id="loginButtonAccess">Giriş Yap</button>
                </p>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
