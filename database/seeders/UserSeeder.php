<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin kullanıcısı
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Örnek öğrenciler
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Öğrenci {$i}",
                'email' => "ogrenci{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'student',
            ]);
        }

        // Örnek koçlar
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => "Koç {$i}",
                'email' => "koc{$i}@example.com",
                'password' => Hash::make('password'),
                'role' => 'coach',
            ]);
        }
    }
} 