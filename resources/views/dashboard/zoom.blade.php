<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="shortcut icon" href="./images/logo.png">
    <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
</head>
<body>
    <header>
        <div class="logo">
            <img src="./images/logo.png" alt="">
            <h2>A<span class="danger">T</span>AY</h2>
        </div>
        <div class="navbar">
            <a href="{{route('account.dashboard')}}">
                <span class="material-icons-sharp">home</span>
                <h3>Ana Menü</h3>
            </a>
            <a href="{{route('account.timeTable')}}" class="active" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Takvim</h3>
            </a> 
            <a href="{{route('account.examination')}}">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Ders İçerikleri</h3>
            </a>
            <a href="password.html">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a>
            <a href="{{route('account.logout')}}">
                <span class="material-icons-sharp">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
        <div id="profile-btn" style="display: none;">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
        </div>
        
    </header>






    <main style="margin: 0;">
        
    </main>

</body>

<script src="{{url('js/timeTable.js')}}"></script>
<script src="{{url('js/app.js')}}"></script>
</html>