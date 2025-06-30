<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'publisher',
        'subject',
        'description',
        'type',
        'grade',
    ];

    // Ders seçenekleri
    public const SUBJECTS = [
        'turkce' => 'Türkçe',
        'edebiyat' => 'Edebiyat',
        'cografya' => 'Coğrafya',
        'tarih' => 'Tarih',
        'felsefe' => 'Felsefe',
        'din' => 'Din Kültürü',
        'matematik' => 'Matematik',
        'geometri' => 'Geometri',
        'fizik' => 'Fizik',
        'kimya' => 'Kimya',
        'biyoloji' => 'Biyoloji',
        'genel' => 'Genel Deneme'
    ];

    // Kaynak türleri
    public const TYPES = [
        'test' => 'Test Kitabı',
        'exam' => 'Deneme Sınavı'
    ];

    // Sınıf seviyeleri
    public const GRADES = [
        '9' => '9. Sınıf',
        '10' => '10. Sınıf',
        '11' => '11. Sınıf',
        '12' => '12. Sınıf',
        'tyt' => 'TYT',
        'ayt' => 'AYT'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
