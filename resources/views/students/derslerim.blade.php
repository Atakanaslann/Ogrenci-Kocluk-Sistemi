<style>
    body {
      background-color: #f5f6fa;
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #6a1b9a, #8e44ad);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  
    .dashboard-wrapper {
      width: 90%;
      max-width: 1200px;
      margin: 20px auto;
      padding: 20px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }
  
    .dashboard-header {
      text-align: center;
      margin-bottom: 30px;
      color: #6a1b9a;
    }
  
    .dashboard-header h1 {
      margin: 0;
      font-size: 2rem;
      font-weight: bold;
    }
  
    .dashboard-header p {
      font-size: 1rem;
      color: #7d7d7d;
    }
  
    .course-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }
  
    .course-card {
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s, box-shadow 0.3s;
      text-align: center;
      padding: 20px;
      color: #6a1b9a;
    }
  
    .course-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }
  
    .course-card h3 {
      font-size: 1.2rem;
      font-weight: bold;
      margin-bottom: 10px;
    }
  
    .course-card p {
      font-size: 0.9rem;
      color: #7d7d7d;
      margin-bottom: 20px;
    }
  
    .course-card a {
      display: inline-block;
      padding: 10px 15px;
      background: #6a1b9a;
      color: #fff;
      text-decoration: none;
      border-radius: 8px;
      font-size: 0.9rem;
      transition: background 0.3s;
    }
  
    .course-card a:hover {
      background: #8e44ad;
    }
  </style>
  
  <div class="dashboard-wrapper">
    <div class="dashboard-header">
      <h1>Derslerim</h1>
      <p>Buradan kayıtlı olduğunuz derslere ulaşabilirsiniz.</p>
    </div>
    <div class="course-grid">
      <!-- Örnek Ders Kartı -->
      <div class="course-card">
        <h3>Matematik 101</h3>
        <p>Temel matematik konularını öğrenin.</p>
        <a href="{{ url('/courses/1') }}">Derse Git</a>
      </div>
      <div class="course-card">
        <h3>Fizik 202</h3>
        <p>Fizik prensiplerini keşfedin.</p>
        <a href="{{ url('/courses/2') }}">Derse Git</a>
      </div>
      <div class="course-card">
        <h3>Kimya 303</h3>
        <p>Kimyanın temel ilkelerini inceleyin.</p>
        <a href="{{ url('/courses/3') }}">Derse Git</a>
      </div>
      <!-- Daha fazla ders kartı eklenebilir -->
    </div>
  </div>
  