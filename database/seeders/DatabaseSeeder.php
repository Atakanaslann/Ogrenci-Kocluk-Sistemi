<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin kullanıcısı
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Koçlar
        $coaches = [
            [
                'name' => 'Ahmet Yılmaz',
                'email' => 'ahmet@example.com',
                'password' => Hash::make('password'),
                'role' => 'coach',
            ],
            [
                'name' => 'Ayşe Demir',
                'email' => 'ayse@example.com',
                'password' => Hash::make('password'),
                'role' => 'coach',
            ],
            [
                'name' => 'Mehmet Kaya',
                'email' => 'mehmet@example.com',
                'password' => Hash::make('password'),
                'role' => 'coach',
            ],
        ];

        foreach ($coaches as $coach) {
            User::create($coach);
        }

        // Öğrenciler
        $students = [
            [
                'name' => 'Ali Yıldız',
                'email' => 'ali@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Zeynep Şahin',
                'email' => 'zeynep@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
            [
                'name' => 'Can Öztürk',
                'email' => 'can@example.com',
                'password' => Hash::make('password'),
                'role' => 'student',
            ],
        ];

        foreach ($students as $student) {
            User::create($student);
        }

        // Diğer seedler
        $this->call(MathTopicsSeeder::class);
        $this->call(LessonsSeeder::class);
    }
}
