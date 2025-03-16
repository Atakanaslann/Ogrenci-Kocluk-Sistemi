<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <!-- Swiper JS CDN -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
    />

    <title>Education Responsive Web Page</title>
  </head>
  <body>
    <header>
      <div class="header">
        <a href="#home" class="logo">
          <i class="fa-solid fa-graduation-cap fa-bounce"></i>
          ATAY KOÇ</a
        >

        <nav class="navbar">
          <a href="#home">Anasayfa</a>
          <a href="#mentors">Koçlar</a>
          <a href="#courses">Kurslar</a>
          <a href="#about">about</a>
          <a href="{{route('account.login')}}">Giriş Yap</a>
        </nav>

        <i id="menu-btn" class="fa-solid fa-bars"></i>
      </div>
    </header>
    <section id="home">
      <div class="row">
        <div class="content-container">
          <span>Start from today!</span>
          <h1>online education</h1>
          <button class="btn"><a href="#courses">Explore</a></button>
        </div>
        <div class="img-container">
          <img src="./images/img-2.png" alt="" />
        </div>
      </div>
    </section>
    <!-- Status Section -->
    <section class="status">
      <div class="box-container">
        <div class="box">
          <i class="fa-solid fa-user-graduate"></i>
          <div class="text">
            <h4>1654+</h4>
            <p>Students</p>
          </div>
        </div>
        <div class="box">
          <i class="fa-solid fa-book-open-reader"></i>
          <div class="text">
            <h4>160+</h4>
            <p>courses</p>
          </div>
        </div>
        <div class="box">
          <i class="fa-solid fa-chalkboard-user"></i>
          <div class="text">
            <h4>900+</h4>
            <p>mentors</p>
          </div>
        </div>
        <div class="box">
          <i class="fa-solid fa-thumbs-up"></i>
          <div class="text">
            <h4>100%</h4>
            <p>results</p>
          </div>
        </div>
      </div>
    </section>
    <!-- About Section -->
    <section id="about">
      <h1 class="heading">About</h1>
      <div class="row">
        <div class="img-container">
          <img src="./images/img-1.png" />
        </div>
        <div class="content-container">
          <h4>Why should you chose us?</h4>
          <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit.
            Reprehenderit in quam deserunt vitae, laudantium voluptate unde
            temporibus nesciunt iusto rerum optio nobis perspiciatis cum, quod
            hic officiis ea. Autem, nihil!
          </p>
          <button class="btn"><a href="#contact">Contact</a></button>
        </div>
      </div>
    </section>
    <!-- Courses SLide section -->
    <section id="courses">
      <h1 class="heading"><span>Our</span> Courses</h1>
      <div class="swiper courses-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <img src="./images/img-3.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Writing</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/img-4.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Science</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/img-7.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Data analyies</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/img-6.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Digital marketing</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/img-7.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Web development</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/img-7.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Web development</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/img-7.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Web development</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/img-7.png" />
            <h5>Course name</h5>
            <div class="tag-container">
              <a href="#" class="tag">Web development</a>
              <span class="rate">9.5</span>
            </div>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
              Laboriosam, expedita!
            </p>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!-- Mentors SLide section -->

    <section id="mentors">
      <h1 class="heading"><span>Our</span> Mentors</h1>
      <h6>Get know your <span>high expert</span> mentors!</h6>
      <div class="swiper mentors-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <img src="./images/Profile/img-2.jpg" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>John Doe</h4>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/Profile/img-2.jpg" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>John Doe</h4>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/Profile/img-2.jpg" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>John Doe</h4>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/Profile/img-2.jpg" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>John Doe</h4>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/Profile/img-2.jpg" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>John Doe</h4>
          </div>
          <div class="swiper-slide slide">
            <img src="./images/Profile/img-2.jpg" />
            <div class="socials">
              <a href="#" class="fa-brands fa-square-facebook"></a>
              <a href="#" class="fa-brands fa-square-twitter"></a>
              <a href="#" class="fa-brands fa-linkedin"></a>
              <a href="#" class="fa-solid fa-square-envelope"></a>
            </div>
            <h4>John Doe</h4>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- Review section -->

    <section id="review">
      <h1 class="heading"><span>Student's</span> Reviews</h1>
      <div class="swiper review-slide">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <p class="review-mssg">
              "Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus ipsam molestiae unde recusandae reprehenderit
              officia?"
            </p>
            <div class="student">
              <img src="./images/Profile/img-3.jpg" />
              <div class="student-info">
                <span>John doe</span>
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
              "Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus ipsam molestiae unde recusandae reprehenderit
              officia?"
            </p>
            <div class="student">
              <img src="./images/Profile/img-3.jpg" />
              <div class="student-info">
                <span>John doe</span>
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
              "Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus ipsam molestiae unde recusandae reprehenderit
              officia?"
            </p>
            <div class="student">
              <img src="./images/Profile/img-3.jpg" />
              <div class="student-info">
                <span>John doe</span>
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
              "Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus ipsam molestiae unde recusandae reprehenderit
              officia?"
            </p>
            <div class="student">
              <img src="./images/Profile/img-3.jpg" />
              <div class="student-info">
                <span>John doe</span>
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
              "Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus ipsam molestiae unde recusandae reprehenderit
              officia?"
            </p>
            <div class="student">
              <img src="./images/Profile/img-3.jpg" />
              <div class="student-info">
                <span>John doe</span>
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
              "Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Voluptatibus ipsam molestiae unde recusandae reprehenderit
              officia?"
            </p>
            <div class="student">
              <img src="./images/Profile/img-3.jpg" />
              <div class="student-info">
                <span>John doe</span>
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
      <p><span>&copy;2023</span>. All right reserved.</p>
    </footer>




    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- Custom Javascript File -->
    <script src="welcome.js"></script>
  </body>
</html>