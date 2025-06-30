<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Girişi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #818cf8;
            --success-color: #22c55e;
            --danger-color: #ef4444;
            --dark-color: #1e293b;
            --light-color: #f1f5f9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            background: var(--light-color);
        }

        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .login-header h1 {
            font-size: 1.5rem;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #64748b;
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .form-group .input-group {
            position: relative;
        }

        .form-group .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            color: var(--dark-color);
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-group .error-message {
            color: var(--danger-color);
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        .login-button {
            width: 100%;
            padding: 0.75rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .login-button:hover {
            background: var(--secondary-color);
        }

        .login-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e2e8f0;
        }

        .login-footer a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-footer a:hover {
            color: var(--secondary-color);
        }

        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #dcfce7;
            color: var(--success-color);
            border: 1px solid #86efac;
        }

        .alert-danger {
            background: #fee2e2;
            color: var(--danger-color);
            border: 1px solid #fca5a5;
        }

        .decoration-side {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: none;
        }

        @media (min-width: 1024px) {
            .decoration-side {
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 2rem;
            }

            .decoration-content {
                text-align: center;
                color: white;
            }

            .decoration-content h2 {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }

            .decoration-content p {
                font-size: 1.125rem;
                opacity: 0.9;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <i class="fas fa-graduation-cap"></i>
                <h1>Admin Girişi</h1>
                <p>Yönetim paneline erişmek için giriş yapın</p>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{Session::get('success')}}
                </div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{Session::get('error')}}
                </div>
            @endif

            <form method="POST" action="{{route('admin.authenticate')}}">
                @csrf
                <div class="form-group">
                    <label for="email">E-posta Adresi</label>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" value="{{old('email')}}" 
                               placeholder="ornek@email.com" class="@error('email') is-invalid @enderror"/>
                    </div>
                    @error('email')
                        <div class="error-message">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Şifre</label>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" 
                               placeholder="••••••••" class="@error('password') is-invalid @enderror"/>
                    </div>
                    @error('password')
                        <div class="error-message">{{$message}}</div>
                    @enderror
                </div>

                <button type="submit" class="login-button">
                    <i class="fas fa-sign-in-alt"></i> Giriş Yap
                </button>
            </form>

            <div class="login-footer">
                <a href="{{url('/')}}">
                    <i class="fas fa-arrow-left"></i> Anasayfaya Dön
                </a>
            </div>
        </div>
    </div>

    <div class="decoration-side">
        <div class="decoration-content">
            <h2>Hoş Geldiniz</h2>
            <p>Yönetim panelinize güvenli bir şekilde erişin</p>
        </div>
    </div>
</body>
</html>
