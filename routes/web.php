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
use App\Http\Controllers\admin\RegisterController as AdminRegisterController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\TeacherController;
use App\Http\Controllers\admin\TimeTableController as AdminTimeTableController;
use App\Http\Controllers\admin\ExaminationController as AdminExaminationController;
use App\Http\Controllers\admin\SubjectController as AdminSubjectController;
use App\Http\Controllers\admin\ClassController as AdminClassController;
use App\Http\Controllers\admin\SectionController as AdminSectionController;
use App\Http\Controllers\admin\StudentAttendanceController as AdminStudentAttendanceController;
use App\Http\Controllers\admin\TeacherAttendanceController as AdminTeacherAttendanceController;
use App\Http\Controllers\admin\LeaveController as AdminLeaveController;
use App\Http\Controllers\admin\FeesController as AdminFeesController;
use App\Http\Controllers\admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\admin\ExpenseController as AdminExpenseController;
use App\Http\Controllers\admin\SalaryController as AdminSalaryController;
use App\Http\Controllers\admin\ReportController as AdminReportController;
use App\Http\Controllers\admin\SettingController as AdminSettingController;
use App\Http\Controllers\admin\ProfileController as AdminProfileController;
use App\Http\Controllers\admin\LogoutController as AdminLogoutController;
use App\Models\User;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\admin\TaskController as AdminTaskController;
use App\Http\Controllers\admin\BookController as AdminBookController;
use App\Http\Controllers\admin\CalendarController as AdminCalendarController;
use App\Http\Controllers\admin\MessageController as AdminMessageController;
use App\Http\Controllers\admin\CoachController;
use App\Http\Controllers\OgrenciSoruAnalizController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::get('/', function () {
    return view('welcome');

});

// Route::prefix('admin')->middleware('auth')->group(function(){
    // Eski kitap route'larını kaldırıyorum
    // route::get('/kitaplar', [BookController::class,'index'])->name('index');
    // route::get('/kitaplar/ekle', [BookController::class,'create'])->name('books.create');
    // route::post('/kitaplar/ekle', [BookController::class,'store'])->name('books.store');
    // route::get('/kitaplar/{id}', [BookController::class,'edit'])->name('books.edit');
    // Route::patch('/books/{id}/complete', [BookController::class, 'markAsCompleted'])->name('books.complete');

    //odevler
    route::get('/odev', [OdevController::class,'index'])->name('odev.edit');
    route::get('/odev/ekle/', [OdevController::class,'create'])->name('odev.create');
    route::post('/odev/ekle/', [OdevController::class,'store'])->name('odev.store');

    //login
    Route::get('login', [LoginController::class, 'index'])->name('login');
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
    Route::middleware(['auth'])->group(function () {
        Route::post('/calendar-events', [CalendarEventController::class, 'store'])->name('calendar.events.store');
        Route::get('/calendar-events/user', [CalendarEventController::class, 'getUserEvents'])->name('calendar.events.user');
        Route::delete('/calendar-events/{id}', [CalendarEventController::class, 'destroy'])->name('calendar.events.destroy');
    });

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
        Route::post('logout',[LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');
    });

     Route::get('timeTable',[timeTable::class,'index'])->name('account.timeTable');
     Route::get('sınavlarim',[sınavlarim::class,'index'])->name('account.examination');
     
});

Route::get('messages', function() {
    return view('dashboard.messages');
})->name('account.messages');



// Admin Panel Routes
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {
    // Giriş yapmamış kullanıcılar için rotalar
    Route::group(['middleware' => 'admin.guest'], function() {
        Route::get('login', [AdminLoginController::class, 'index'])->name('login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('authenticate');
    });

    // Giriş yapmış kullanıcılar için rotalar
    Route::group(['middleware' => 'admin.auth'], function() {
        // Dashboard
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Öğrenciler
        Route::get('students', [StudentController::class, 'index'])->name('students.index');
        Route::get('students/create', [StudentController::class, 'create'])->name('students.create');
        Route::post('students', [StudentController::class, 'store'])->name('students.store');
        Route::get('students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
        Route::put('students/{student}', [StudentController::class, 'update'])->name('students.update');
        Route::delete('students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
        Route::post('students/{student}/assign-book', [StudentController::class, 'assignBook'])->name('students.assign-book');
        Route::get('students/{student}/books', [StudentController::class, 'getBooks'])->name('students.books');
        Route::delete('students/{student}/remove-book/{book}', [StudentController::class, 'removeBook'])->name('students.remove-book');

        // Koçlar
        Route::get('teachers', [TeacherController::class, 'index'])->name('teachers.index');
        Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
        Route::post('teachers', [TeacherController::class, 'store'])->name('teachers.store');
        Route::get('teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
        Route::put('teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
        Route::delete('teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');

        // Görevler
        Route::get('tasks', [AdminTaskController::class, 'index'])->name('tasks.index');
        Route::get('tasks/create', [AdminTaskController::class, 'create'])->name('tasks.create');
        Route::post('tasks', [AdminTaskController::class, 'store'])->name('tasks.store');
        Route::get('tasks/{task}/edit', [AdminTaskController::class, 'edit'])->name('tasks.edit');
        Route::put('tasks/{task}', [AdminTaskController::class, 'update'])->name('tasks.update');
        Route::delete('tasks/{task}', [AdminTaskController::class, 'destroy'])->name('tasks.destroy');

        // Kitaplar
        Route::get('books', [AdminBookController::class, 'index'])->name('books.index');
        Route::get('books/create', [AdminBookController::class, 'create'])->name('books.create');
        Route::post('books', [AdminBookController::class, 'store'])->name('books.store');
        Route::get('books/{book}/edit', [AdminBookController::class, 'edit'])->name('books.edit');
        Route::put('books/{book}', [AdminBookController::class, 'update'])->name('books.update');
        Route::delete('books/{book}', [AdminBookController::class, 'destroy'])->name('books.destroy');

        // Çıkış
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
        Route::resource('lessons', App\Http\Controllers\Admin\LessonController::class);
        Route::get('lessons/{lesson}/topics', [App\Http\Controllers\Admin\LessonController::class, 'topics'])->name('lessons.topics');
        Route::post('lessons/{lesson}/topics', [App\Http\Controllers\Admin\LessonController::class, 'addTopic'])->name('lessons.topics.add');
    });
});

Route::prefix('admin/coaches')->name('admin.coaches.')->group(function () {
    Route::get('/', [CoachController::class, 'index'])->name('index');
    Route::get('/create', [CoachController::class, 'create'])->name('create');
    Route::post('/', [CoachController::class, 'store'])->name('store');
    Route::get('/{coach}/edit', [CoachController::class, 'edit'])->name('edit');
    Route::put('/{coach}', [CoachController::class, 'update'])->name('update');
    Route::delete('/{coach}', [CoachController::class, 'destroy'])->name('destroy');
    Route::post('/{coach}/assign-student', [CoachController::class, 'assignStudent'])->name('assign-student');
    Route::get('/{coach}/students', [CoachController::class, 'getStudents'])->name('students');
    Route::delete('/{coach}/remove-student/{student}', [CoachController::class, 'removeStudent'])->name('remove-student');
});

// Route::get('admin/login',[CoachLoginController::class,'index'])->name('admin.login');

Route::middleware(['auth'])->group(function () {
    // Mevcut route'lar
    Route::get('/tasks', [TaskController::class, 'list'])->name('tasks.list');
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/tasks/assign', [TaskController::class, 'assign'])->name('tasks.assign');
    Route::post('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
    Route::post('/tasks/{task}/note', [TaskController::class, 'addNote'])->name('tasks.note');
    Route::post('/tasks/{task}/approve', [TaskController::class, 'approve'])->name('tasks.approve');
    Route::post('/tasks/{task}/reject', [TaskController::class, 'reject'])->name('tasks.reject');
    
    // Mesajlaşma route'ları
    Route::get('/chat/coach', [ChatController::class, 'getCoach']);
    Route::get('/chat/history/{user}', [ChatController::class, 'history']);
    Route::post('/chat/send', [ChatController::class, 'send']);
    Route::post('/chat/messages/{message}/read', [ChatController::class, 'markAsRead']);
    Route::get('/chat/unread/count', [ChatController::class, 'getUnreadCount']);

    Route::get('/profile', function() {
        return view('profile');
    })->name('profile');
    Route::post('/profile/update', function() {
        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'tc_kimlik' => ['required', 'digits:11'],
            'city' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
        ]);
        $user = Auth::user();
        $user->update($data);
        return redirect()->back()->with('success', 'Profil bilgileri başarıyla güncellendi!');
    })->name('profile.update');
    Route::post('/profile/password', function() {
        $user = Auth::user();
        $data = request()->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:6', 'confirmed'],
        ]);
        if (!\Hash::check($data['current_password'], $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Mevcut şifre yanlış!']);
        }
        $user->password = bcrypt($data['new_password']);
        $user->save();
        return redirect()->back()->with('success', 'Şifre başarıyla güncellendi!');
    })->name('profile.password');
});

// Koç rotaları
Route::middleware(['auth', 'App\Http\Middleware\CoachMiddleware'])->prefix('coach')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'coach'])->name('coach.dashboard');
    Route::get('/students', [DashboardController::class, 'getStudents'])->name('coach.students');
    
    // Görev rotaları
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::post('/tasks/assign', [TaskController::class, 'assign'])->name('tasks.assign');
    Route::post('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
    
    // Mesajlaşma rotaları
    Route::get('/chat/history/{student}', [ChatController::class, 'history'])->name('chat.history');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
    Route::post('/chat/messages/{message}/read', [ChatController::class, 'markAsRead'])->name('chat.markAsRead');
    Route::get('/chat/unread/count', [ChatController::class, 'getUnreadCount'])->name('chat.unreadCount');
});

Route::post('/analiz-kaydet', [OgrenciSoruAnalizController::class, 'store'])->name('analiz.kaydet');
Route::get('/analiz/{task_id}', [OgrenciSoruAnalizController::class, 'show'])->name('analiz.show');
Route::post('/analiz-guncelle', [OgrenciSoruAnalizController::class, 'update'])->name('analiz.update');
Route::get('/student/{student_id}/analysis', [OgrenciSoruAnalizController::class, 'studentAnalysis'])->name('student.analysis');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/subjects/{subject}/topics', function($subjectId) {
    $topics = \App\Models\Topic::where('lesson_id', $subjectId)->get(['id', 'title']);
    return response()->json($topics);
})->name('subjects.topics');

    