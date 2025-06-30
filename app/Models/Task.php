<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'due_date',
        'completed',
        'completed_at',
        'approved',
        'approved_at',
        'student_id',
        'coach_id',
        'task_type',
        'ders_type',
        'ders_konu',
        'deneme_type',
        'deneme_ders',
        'deneme_sure'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'completed_at' => 'datetime',
        'approved_at' => 'datetime',
        'completed' => 'boolean',
        'approved' => 'boolean'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }
}
