<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lessons = [
            ['name' => 'Matematik', 'type' => 'tyt', 'category' => 'matematik', 'description' => 'Matematik dersi'],
            ['name' => 'Türkçe', 'type' => 'tyt', 'category' => 'turkce', 'description' => 'Türkçe dersi'],
            ['name' => 'Tarih', 'type' => 'tyt', 'category' => 'tarih', 'description' => 'Tarih dersi'],
            ['name' => 'Coğrafya', 'type' => 'tyt', 'category' => 'cografya', 'description' => 'Coğrafya dersi'],
            ['name' => 'Felsefe', 'type' => 'tyt', 'category' => 'felsefe', 'description' => 'Felsefe dersi'],
            ['name' => 'Din Kültürü ve Ahlak Bilgisi', 'type' => 'tyt', 'category' => 'din', 'description' => 'Din Kültürü ve Ahlak Bilgisi dersi'],
            ['name' => 'Fizik', 'type' => 'tyt', 'category' => 'fizik', 'description' => 'Fizik dersi'],
            ['name' => 'Kimya', 'type' => 'tyt', 'category' => 'kimya', 'description' => 'Kimya dersi'],
            ['name' => 'Biyoloji', 'type' => 'tyt', 'category' => 'biyoloji', 'description' => 'Biyoloji dersi'],
            ['name' => 'Geometri', 'type' => 'tyt', 'category' => 'geometri', 'description' => 'Geometri dersi'],
        ];
        foreach ($lessons as $lesson) {
            DB::table('subjects')->updateOrInsert(
                ['name' => $lesson['name']],
                [
                    'type' => $lesson['type'],
                    'category' => $lesson['category'],
                    'description' => $lesson['description'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
