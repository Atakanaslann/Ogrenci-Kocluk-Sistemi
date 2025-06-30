<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'city',
        'phone',
        'tc_kimlik',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isStudent()
    {
        return $this->role === 'student';
    }

    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, $this->role === 'student' ? 'student_id' : 'teacher_id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class)->withTimestamps();
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'coach_student', 'coach_id', 'student_id')
            ->where('role', 'student');
    }

    public function coaches()
    {
        return $this->belongsToMany(User::class, 'coach_student', 'student_id', 'coach_id')
            ->where('role', 'coach');
    }
}
