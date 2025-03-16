<?php

use App\Http\Controllers\DerslerimController;
use App\Http\Controllers\sınavlarim;
use App\Http\Controllers\timeTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OdevController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as CoachLoginController;
use App\Models\User;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CalendarEventController;

Route::get('/', function () {
    return view('welcome');

});

// Route::prefix('admin')->middleware('auth')->group(function(){
    route::get('/kitaplar', [BookController::class,'index'])->name('index');
    route::get('/kitaplar/ekle', [BookController::class,'create'])->name('books.create');
    route::post('/kitaplar/ekle', [BookController::class,'store'])->name('books.store');
    route::get('/kitaplar/{id}', [BookController::class,'edit'])->name('books.edit');
    Route::patch('/books/{id}/complete', [BookController::class, 'markAsCompleted'])->name('books.complete');


    //odevler
    route::get('/odev', [OdevController::class,'index'])->name('odev.edit');
    route::get('/odev/ekle/', [OdevController::class,'create'])->name('odev.create');
    route::post('/odev/ekle/', [OdevController::class,'store'])->name('odev.store');

    //login
    Route::get('login',[AuthController::class,'login']);
    Route::post('login_post',[AuthController::class,'login_post']);

    //register
    Route::get('register',[AuthController::class,'register']);
    Route::post('register_post',[AuthController::class,'register_post']);

    //students dashboards
    Route::get("students",[DashboardController::class,"index"]);
    Route::get("coach",[DashboardController::class,"coach"]);

    //Derslerim
    Route::get("derslerim",[DerslerimController::class,"index"]);

    //takvim ve not
    Route::get('/calendar', [CalendarController::class, 'index']);
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    
    // Takvim etkinlikleri için rotalar
    Route::post('/calendar-events', [CalendarEventController::class, 'store'])->name('calendar.events.store');
    Route::get('/calendar-events', [CalendarEventController::class, 'getUserEvents'])->name('calendar.events.user');
    Route::delete('/calendar-events/{id}', [CalendarEventController::class, 'destroy'])->name('calendar.events.destroy');

    Route::get('/ogrenciler', [DashboardController::class, 'getStudents']);



Route::group(['prefix' => 'account'],function(){

    //Guest middleware
    Route::group(['middleware' => 'guest'],function(){
        //yeni login
        Route::get('login',[LoginController::class,'index'])->name('account.login');
        Route::get('register',[LoginController::class,'register'])->name('account.register');
        Route::post('process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');
    });

    // Authentiated middleware
    Route::group(['middleware' => 'auth'],function(){
        Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');
    });

     Route::get('timeTable',[timeTable::class,'index'])->name('account.timeTable');
     Route::get('sınavlarim',[sınavlarim::class,'index'])->name('account.examination');
     
});



Route::group(['prefix' => 'admin'],function(){

    //Guest middleware
    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('/login',[AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate',[AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    // Authentiated middleware
    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
        Route::get('/logout',[AdminLoginController::class,'logout'])->name('admin.logout');
    });


     
     
});



// Route::get('admin/login',[CoachLoginController::class,'index'])->name('admin.login');

Route::middleware(['auth'])->group(function () {
    // Mevcut route'lar
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
});

    