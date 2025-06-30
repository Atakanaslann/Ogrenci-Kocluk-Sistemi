<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Bilgi Ekranı</title>
    
    <!-- Google Fonts: Poppins (Sade ve Modern) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
    
    <!-- Feather Icons (Minimalist ikon seti) -->
    <script src="https://unpkg.com/feather-icons"></script>

    <style>
        /* =================================================================
           1. GLOBAL AYARLAR VE TASARIM SİSTEMİ
           ================================================================= */
        :root {
            --background-color: #f8f9fa; /* Çok hafif gri arka plan */
            --card-background: #ffffff; /* İsteğiniz üzerine beyaz kart */
            --text-primary: #212529; /* Ana metin rengi (koyu gri) */
            --text-secondary: #6c757d; /* İkincil metin (etiketler için) */
            --accent-color: #007bff; /* Vurgu rengi (ikonlar ve buton) */
            --border-color: #e9ecef; /* Ayırıcı çizgilerin rengi */
            --border-radius: 12px;
            --box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--background-color);
            color: var(--text-primary);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* =================================================================
           2. ANA PROFİL KARTI
           ================================================================= */
        .profile-card-container {
            width: 100%;
            max-width: 600px;
        }

        .profile-card {
            background-color: var(--card-background);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 32px;
            border: 1px solid var(--border-color);
        }

        /* =================================================================
           3. KART İÇERİĞİ (Başlık, Liste, Buton)
           ================================================================= */
        .card-header h1 {
            font-size: 24px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 32px;
        }

        .info-list {
            list-style: none;
        }
        
        .info-list li {
            display: flex;
            align-items: center;
            padding: 16px 0;
            border-bottom: 1px solid var(--border-color);
            font-size: 16px;
        }

        .info-list li:last-child {
            border-bottom: none; /* Son elemanın alt çizgisini kaldır */
        }

        .info-list .icon {
            color: var(--accent-color);
            margin-right: 16px;
        }

        .info-list .label {
            font-weight: 500;
            color: var(--text-secondary);
            margin-right: 8px;
        }
        
        .info-list .value {
            font-weight: 400;
            color: var(--text-primary);
            /* Değerin sona yaslanması için */
            margin-left: auto; 
            text-align: right;
        }
        
        .edit-button {
            width: 100%;
            padding: 12px;
            margin-top: 32px;
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: background-color 0.2s ease, transform 0.2s ease;
        }

        .edit-button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        
        /* =================================================================
           4. RESPONSIVE TASARIM (Mobil Cihazlar için)
           ================================================================= */
        @media (max-width: 600px) {
            body {
                padding: 16px;
            }
            .profile-card {
                padding: 24px;
            }
            .card-header h1 {
                font-size: 20px;
            }
            .info-list li {
                font-size: 14px;
                flex-wrap: wrap; /* Küçük ekranlarda sığmazsa alt satıra geçsin */
            }
            .info-list .value {
                margin-left: 0;
                margin-top: 4px;
                flex-basis: 100%; /* Değeri her zaman alt satıra al */
                text-align: left;
                padding-left: 40px; /* İkon hizasından başlatmak için */
            }
        }

        .site-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 64px;
            background: transparent;
            display: flex;
            align-items: center;
            z-index: 1100;
            padding-left: 24px;
        }
        .logo-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            gap: 10px;
        }
        .logo-img {
            height: 38px;
            width: 38px;
            display: block;
        }
        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: #23243a;
            letter-spacing: 1px;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }
        .logo-text .danger {
            color: #3b82f6;
        }
        @media (max-width: 600px) {
            .site-header {
                height: 48px;
                padding-left: 8px;
            }
            .logo-img {
                height: 28px;
                width: 28px;
            }
            .logo-text {
                font-size: 1.1rem;
            }
        }
        body {
            padding-top: 64px;
        }
        @media (max-width: 600px) {
            body {
                padding-top: 48px;
            }
        }
    </style>
</head>
<body>
    <header class="site-header">
        <a  class="logo-link">
            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" alt="ATAY KOÇ Logo" class="logo-img">
            <h2 class="logo-text">A<span class="danger">T</span>AY KOÇ</h2>
        </a>
    </header>

    <div class="profile-card-container">
        <div class="profile-card">
            <div class="card-header">
                <h1>Kullanıcı Profili</h1>
            </div>

            <ul class="info-list">
                <li>
                    <i class="icon" data-feather="user"></i>
                    <span class="label">Ad Soyad:</span>
                    <span class="value">{{ Auth::user()->name ?? '---' }}</span>
                </li>
                <li>
                    <i class="icon" data-feather="mail"></i>
                    <span class="label">E-posta:</span>
                    <span class="value">{{ Auth::user()->email ?? '---' }}</span>
                </li>
                <li>
                    <i class="icon" data-feather="credit-card"></i>
                    <span class="label">T.C. Kimlik No:</span>
                    <span class="value">{{ Auth::user()->tc_kimlik ?? '---' }}</span>
                </li>
                <li>
                    <i class="icon" data-feather="phone"></i>
                    <span class="label">Telefon:</span>
                    <span class="value">{{ Auth::user()->phone ?? '---' }}</span>
                </li>
                <li>
                    <i class="icon" data-feather="map-pin"></i>
                    <span class="label">Şehir:</span>
                    <span class="value">{{ Auth::user()->city ?? '---' }}</span>
                </li>
            </ul>

            <button class="edit-button" onclick="openEditModal()">Bilgileri Düzenle</button>
        </div>
    </div>

    <!-- Düzenleme Modalı -->
    <div id="editModal" class="modal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(33,37,41,0.18); z-index:1000; align-items:center; justify-content:center;">
        <div class="modal-content" style="background:#fff; border-radius:16px; box-shadow:0 4px 32px rgba(0,0,0,0.13); padding:32px 24px; max-width:400px; width:90%; position:relative;">
            <h2 style="font-size:20px; font-weight:600; margin-bottom:24px; text-align:center;">Bilgileri Düzenle</h2>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div style="display:flex; flex-direction:column; gap:16px;">
                    <label style="font-weight:500; color:#6c757d;">Ad Soyad
                        <input type="text" name="name" value="{{ Auth::user()->name }}" required style="width:100%; padding:10px; border:1px solid #e9ecef; border-radius:8px; margin-top:4px; font-size:15px;">
                    </label>
                    <label style="font-weight:500; color:#6c757d;">E-posta
                        <input type="email" name="email" value="{{ Auth::user()->email }}" required style="width:100%; padding:10px; border:1px solid #e9ecef; border-radius:8px; margin-top:4px; font-size:15px;">
                    </label>
                    <label style="font-weight:500; color:#6c757d;">T.C. Kimlik No
                        <input type="text" name="tc_kimlik" value="{{ Auth::user()->tc_kimlik }}" maxlength="11" style="width:100%; padding:10px; border:1px solid #e9ecef; border-radius:8px; margin-top:4px; font-size:15px;">
                    </label>
                    <label style="font-weight:500; color:#6c757d;">Telefon
                        <input type="text" name="phone" value="{{ Auth::user()->phone }}" style="width:100%; padding:10px; border:1px solid #e9ecef; border-radius:8px; margin-top:4px; font-size:15px;">
                    </label>
                    <label style="font-weight:500; color:#6c757d;">Şehir
                        <input type="text" name="city" value="{{ Auth::user()->city }}" style="width:100%; padding:10px; border:1px solid #e9ecef; border-radius:8px; margin-top:4px; font-size:15px;">
                    </label>
                </div>
                <div style="display:flex; gap:12px; margin-top:28px; justify-content:center;">
                    <button type="button" onclick="closeEditModal()" style="padding:10px 20px; border:none; border-radius:8px; background:#e9ecef; color:#212529; font-weight:500; cursor:pointer;">Vazgeç</button>
                    <button type="submit" style="padding:10px 20px; border:none; border-radius:8px; background:#007bff; color:#fff; font-weight:500; cursor:pointer;">Kaydet</button>
                </div>
            </form>
            <button onclick="closeEditModal()" style="position:absolute; top:16px; right:16px; background:none; border:none; font-size:22px; color:#6c757d; cursor:pointer;">&times;</button>
        </div>
    </div>

    <script>
        // Feather Icons'ı etkinleştir
        feather.replace();

        function openEditModal() {
            document.getElementById('editModal').style.display = 'flex';
        }
        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }
    </script>

</body>
</html>