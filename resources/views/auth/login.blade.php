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

    <!-- BOOTSTRAP 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />

    <title>Kullanıcı Girişi ve Kayıt</title>
</head>
<body>
    <!-- LOGIN VE KAYIT FORMU -->
    <div class="login container grid" id="loginAccessRegister">
        <!-- Giriş Yap -->
        <div class="login__access">
            <a href="/" class="login__home-link">
                <i class="ri-arrow-left-line"></i>
                Ana Sayfa
            </a>
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
                    <a href="{{ route('password.request') }}" class="login__forgot" style="color:#a5a6b2; font-size:1rem; text-decoration:none; font-weight:500;">Şifremi unuttum?</a>
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

    <!-- Animasyon Alanı Başlangıç -->
    <div class="login__visual-modern d-flex align-items-center justify-content-end">
      <div class="position-relative" style="height: 100vh; display: flex; align-items: center;">
        <div class="login__visual-bg"></div>
        <lottie-player
          src="https://assets10.lottiefiles.com/packages/lf20_jcikwtux.json"
          background="transparent"
          speed="1"
          style="width: 340px; height: 340px;"
          loop
          autoplay>
        </lottie-player>
      </div>
    </div>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Animasyon Alanı Bitiş -->

    <!-- JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>

    <style>
    .login__home-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: #f3f4f6;
        border-radius: 1.2rem;
        padding: 0.45rem 1.1rem;
        font-weight: 500;
        color: #2563eb;
        text-decoration: none;
        box-shadow: 0 2px 8px rgba(99,102,241,0.07);
        transition: background 0.2s, color 0.2s;
        font-size: 1rem;
        margin-bottom: 1.2rem;
    }
    .login__home-link:hover {
        background: #e0e7ff;
        color: #1d4ed8;
    }
    .login__home-link i {
        font-size: 1.2rem;
    }
    .login__img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        border-radius: 0;
    }
    .login__visual-modern {
        position: absolute; top: 0; right: 0; bottom: 0;
        width: 48vw; min-width: 320px; height: 100vh;
        display: flex; align-items: center; justify-content: flex-end;
        background: transparent; z-index: 1; overflow: hidden;
    }
    @media (max-width: 900px) { .login__visual-modern { display: none; } }
    .login__visual-bg {
        position: absolute; right: 0; top: 50%; transform: translateY(-50%);
        width: 420px; height: 420px; border-radius: 50%;
        background: linear-gradient(135deg, #e0e7ff 0%, #6366f1 100%);
        filter: blur(18px) brightness(1.08);
        opacity: 0.45; z-index: 1;
    }
    .login__visual-img {
        position: relative; z-index: 2; max-width: 340px; width: 80%; height: auto;
        object-fit: contain; border-radius: 1.5rem;
        box-shadow: 0 8px 32px 0 rgba(99,102,241,0.13);
    }
    </style>
</body>
</html>
