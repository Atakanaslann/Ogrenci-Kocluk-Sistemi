<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" />
    <!-- Custom CSS File -->
    <link rel="stylesheet" href={{asset('css/welcome.css')}} />
    <!-- Font Awesome Icons CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Lottie Player -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <!-- Swiper JS CDN -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>ATAY KOÇ - Online Eğitim Platformu</title>
  </head>
  <body data-theme="dark">
    <header>
      <div class="header">
        <a href="#home" class="logo">
          <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 640 512'%3E%3Cpath fill='%233b82f6' d='M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496 288 320 364.8 144 288L128 408z'/%3E%3C/svg%3E" alt="ATAY KOÇ Logo">
          <h2>A<span class="danger">T</span>AY KOÇ</h2>
        </a>

        <nav class="navbar">
          <a href="#home">Ana Sayfa</a>
          <a href="#mentors">Eğitmenler</a>
          <a href="#courses">Kurslar</a>
          <a href="#about">Hakkımızda</a>
          <a href="{{route('account.login')}}" class="login-btn">Giriş Yap</a>
        </nav>

        <div class="theme-toggle">
          <button id="theme-toggle" class="theme-toggle-btn">
            <i class="fa-solid fa-sun"></i>
          </button>
        </div>

        <i id="menu-btn" class="fa-solid fa-bars"></i>
      </div>
    </header>
    <section id="home">
      <div class="row">
        <div class="content-container">
          <span>Bugünden Başla!</span>
          <h1>Online Eğitimde Yeni Nesil</h1>
          <p>Kaliteli eğitim, uzman eğitmenler ve interaktif içeriklerle geleceğinizi şekillendirin.</p>
          <button class="btn"><a href="#courses">Kursları Keşfet</a></button>
        </div>
        <div class="img-container" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
          <!-- Online Eğitim Kartı Başlangıç -->
          <div class="online-education-card" style="width: 100%; max-width: 700px; aspect-ratio: 3/2; border-radius: 18px; display: flex; align-items: center; justify-content: center; margin: 0 auto 2rem auto; box-shadow: 0 4px 32px rgba(59,130,246,0.13);">
            <lottie-player src="/images/onlineEducation1.json" background="transparent" speed="1" style="width: 80%; height: 80%; min-width: 220px; min-height: 160px; max-width: 90%; max-height: 90%;" loop autoplay aria-label="Online Eğitim Animasyonu"></lottie-player>
          </div>
          <!-- Online Eğitim Kartı Bitiş -->
        </div>
      </div>
    </section>
    <!-- Status Section -->
    <section class="status">
      <div class="box-container">
        <div class="box">
          <i class="fa-solid fa-users fa-3x"></i>
          <div class="text">
            <h4>100.000+</h4>
            <p>Öğrenci</p>
          </div>
        </div>
        <div class="box">
          <i class="fa-solid fa-star fa-3x"></i>
          <div class="text">
            <h4>4.8/5</h4>
            <p>Puan</p>
          </div>
        </div>
        <div class="box">
          <i class="fa-solid fa-certificate fa-3x"></i>
          <div class="text">
            <h4>%100</h4>
            <p>Sertifikalı</p>
          </div>
        </div>
      </div>
    </section>
    <!-- About Section -->
    <section id="about">
      <h1 class="heading">Hakkımızda</h1>
      <div class="row">
        <div class="img-container" style="display: flex; align-items: center; justify-content: center;">
          <lottie-player src="/images/aboutUs1.json" background="transparent" speed="1" style="width: 90%; max-width: 600px; min-width: 220px; aspect-ratio: 3/2; height: auto;" loop autoplay aria-label="Hakkımızda Animasyonu"></lottie-player>
        </div>
        <div class="content-container">
          <h4>Neden Bizi Seçmelisiniz?</h4>
          <p>
            ATAY KOÇ olarak, eğitimde kalite ve başarıyı ön planda tutuyoruz. Deneyimli eğitmen kadromuz, 
            güncel müfredatımız ve interaktif öğrenme platformumuz ile öğrencilerimize en iyi eğitim deneyimini sunuyoruz. 
            Modern teknolojiler ve yenilikçi öğretim yöntemleriyle, öğrencilerimizin hedeflerine ulaşmalarına yardımcı oluyoruz.
          </p>
          <button class="btn"><a href="#contact">İletişime Geç</a></button>
        </div>
      </div>
    </section>
    <!-- Courses SLide section -->
    <section id="courses">
      <h1 class="heading"><span>Derslerimiz</span></h1>
      <div class="courses-container">
        <div class="course-category">
          <h2>TYT Dersleri</h2>
          <div class="swiper courses-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/3b82f6/ffffff?text=TYT+Matematik" alt="TYT Matematik" />
                <div class="slide-content">
                  <h5>TYT Matematik</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">Temel Matematik</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Temel kavramlar, sayılar, cebir, geometri ve problemler konularında kapsamlı eğitim.
                  </p>
                </div>
              </div>
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/1e40af/ffffff?text=TYT+Türkçe" alt="TYT Türkçe" />
                <div class="slide-content">
                  <h5>TYT Türkçe</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">Dil Bilgisi</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Dil bilgisi, anlam bilgisi, paragraf ve sözel mantık konularında detaylı eğitim.
                  </p>
                </div>
              </div>
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/3b82f6/ffffff?text=TYT+Fen+Bilimleri" alt="TYT Fen Bilimleri" />
                <div class="slide-content">
                  <h5>TYT Fen Bilimleri</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">Fizik-Kimya-Biyoloji</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Fizik, kimya ve biyoloji derslerinin temel konularında kapsamlı eğitim.
                  </p>
                </div>
              </div>
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/1e40af/ffffff?text=TYT+Sosyal+Bilimler" alt="TYT Sosyal Bilimler" />
                <div class="slide-content">
                  <h5>TYT Sosyal Bilimler</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">Tarih-Coğrafya</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Tarih, coğrafya, felsefe ve din kültürü konularında detaylı eğitim.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="course-category">
          <h2>AYT Dersleri</h2>
          <div class="swiper courses-slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/3b82f6/ffffff?text=AYT+Matematik" alt="AYT Matematik" />
                <div class="slide-content">
                  <h5>AYT Matematik</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">İleri Matematik</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Türev, integral, analitik geometri ve ileri düzey matematik konularında eğitim.
                  </p>
                </div>
              </div>
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/1e40af/ffffff?text=AYT+Fizik" alt="AYT Fizik" />
                <div class="slide-content">
                  <h5>AYT Fizik</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">İleri Fizik</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Elektrik, manyetizma, modern fizik ve mekanik konularında detaylı eğitim.
                  </p>
                </div>
              </div>
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/3b82f6/ffffff?text=AYT+Kimya" alt="AYT Kimya" />
                <div class="slide-content">
                  <h5>AYT Kimya</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">İleri Kimya</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Organik kimya, reaksiyonlar, çözeltiler ve kimyasal denge konularında eğitim.
                  </p>
                </div>
              </div>
              <div class="swiper-slide slide">
                <img src="https://placehold.co/400x300/1e40af/ffffff?text=AYT+Biyoloji" alt="AYT Biyoloji" />
                <div class="slide-content">
                  <h5>AYT Biyoloji</h5>
                  <div class="tag-container">
                    <a href="#" class="tag">İleri Biyoloji</a>
                    <span class="rate">9.5</span>
                  </div>
                  <p>
                    Canlılar bilimi, genetik, sistemler ve ekoloji konularında detaylı eğitim.
                  </p>
                </div>
              </div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </section>
    <!-- Mentors SLide section -->
    <section id="mentors">
      <h1 class="heading"><span>Eğitmenlerimiz</span></h1>
      <h6>Alanında <span>uzman</span> eğitmenlerimizle tanışın!</h6>
      <div class="swiper mentors-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <img src="https://placehold.co/200x200/3b82f6/ffffff?text=Prof.+Dr.+Ahmet+Yılmaz" alt="Eğitmen" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>Prof. Dr. Ahmet Yılmaz</h4>
            <p>TYT-AYT Matematik</p>
            <span class="experience">20+ Yıl Deneyim</span>
          </div>
          <div class="swiper-slide slide">
            <img src="https://placehold.co/200x200/1e40af/ffffff?text=Dr.+Ayşe+Demir" alt="Eğitmen" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>Dr. Ayşe Demir</h4>
            <p>TYT-AYT Fizik</p>
            <span class="experience">15+ Yıl Deneyim</span>
          </div>
          <div class="swiper-slide slide">
            <img src="https://placehold.co/200x200/3b82f6/ffffff?text=Doç.+Dr.+Mehmet+Kaya" alt="Eğitmen" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>Doç. Dr. Mehmet Kaya</h4>
            <p>TYT-AYT Kimya</p>
            <span class="experience">18+ Yıl Deneyim</span>
          </div>
          <div class="swiper-slide slide">
            <img src="https://placehold.co/200x200/1e40af/ffffff?text=Dr.+Zeynep+Şahin" alt="Eğitmen" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>Dr. Zeynep Şahin</h4>
            <p>TYT-AYT Biyoloji</p>
            <span class="experience">12+ Yıl Deneyim</span>
          </div>
          <div class="swiper-slide slide">
            <img src="https://placehold.co/200x200/3b82f6/ffffff?text=Prof.+Dr.+Ali+Öztürk" alt="Eğitmen" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>Prof. Dr. Ali Öztürk</h4>
            <p>TYT-AYT Türkçe-Edebiyat</p>
            <span class="experience">25+ Yıl Deneyim</span>
          </div>
          <div class="swiper-slide slide">
            <img src="https://placehold.co/200x200/1e40af/ffffff?text=Doç.+Dr.+Fatma+Yıldız" alt="Eğitmen" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>Doç. Dr. Fatma Yıldız</h4>
            <p>TYT-AYT Tarih</p>
            <span class="experience">16+ Yıl Deneyim</span>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- Review section -->
    <section id="review">
      <h1 class="heading"><span>Öğrenci</span> Yorumları</h1>
      <div class="swiper review-slide">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <p class="review-mssg">
              "ATAY KOÇ sayesinde TYT Matematik netlerim 30'dan 37'ye yükseldi. Eğitmenlerin anlatımı ve soru çözüm teknikleri gerçekten çok faydalı oldu."
            </p>
            <div class="student">
              <img src="https://placehold.co/100x100/3b82f6/ffffff?text=Ahmet+Y." alt="Öğrenci" />
              <div class="student-info">
                <span>Ahmet Y.</span>
                <div class="student-details">
                  <p class="school">Ankara Fen Lisesi</p>
                  <p class="course">TYT Matematik</p>
                </div>
                <div class="rate-stars">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide slide">
            <p class="review-mssg">
              "AYT Fizik derslerindeki deney videoları ve soru çözümleri sayesinde konuları daha iyi kavradım. Teşekkürler ATAY KOÇ!"
            </p>
            <div class="student">
              <img src="https://placehold.co/100x100/1e40af/ffffff?text=Zeynep+K." alt="Öğrenci" />
              <div class="student-info">
                <span>Zeynep K.</span>
                <div class="student-details">
                  <p class="school">İzmir Anadolu Lisesi</p>
                  <p class="course">AYT Fizik</p>
                </div>
                <div class="rate-stars">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide slide">
            <p class="review-mssg">
              "TYT-AYT Kimya derslerindeki konu anlatımları ve özel çözüm teknikleri sayesinde kimya artık en sevdiğim ders oldu."
            </p>
            <div class="student">
              <img src="https://placehold.co/100x100/3b82f6/ffffff?text=Elif+M." alt="Öğrenci" />
              <div class="student-info">
                <span>Elif M.</span>
                <div class="student-details">
                  <p class="school">İstanbul Anadolu Lisesi</p>
                  <p class="course">TYT-AYT Kimya</p>
                </div>
                <div class="rate-stars">
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                  <i class="fa-solid fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- Footer Section -->
    <footer>
      <div class="social-network">
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-twitter"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
      </div>
      <p><span>&copy;2024</span> ATAY KOÇ. Tüm hakları saklıdır.</p>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Custom Javascript File -->
    <script src={{asset('js/welcome.js')}}></script>
  </body>
</html>