<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MathTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Geometri konuları (görseldeki gibi)
        $geometriTopics = [
            'Doğruda ve Üçgende Açılar',
            'Üçgende Açı-Kenar Bağıntıları',
            'Üçgende Benzerlik',
            'Üçgende Açıortay-Kenarortay',
            'Dik Üçgen',
            'İkizkenar Üçgen',
            'Eşkenar Üçgen',
            'Üçgende alan',
            'Çokgenler',
            'Dörtgenler',
            'Yamuk-Paralelkenar',
            'Eşkenar Dörtgen',
            'Dikdörtgen',
            'Kare',
            'Deltoid',
            'Çemberde Açı',
            'Çemberde Uzunluk',
            'Dairenin Çevresi ve Alanı',
            'Doğrunun Analitik İncelenmesi',
            'Çemberin Analitik İncelenmesi',
            'Katı Cisimler (Prizma,Küp,Piramit,Dikdörtgenler Prizması,Silindir,Küre,Koni,Küre)',
        ];
        foreach ($geometriTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => 11, // Geometri'nin güncel ID'si
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
