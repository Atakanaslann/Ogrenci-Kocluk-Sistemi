<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Matematik
        $mathId = DB::table('subjects')->where('name', 'Matematik')->value('id');
        $mathTopics = [
            'Temel Kavramlar',
            'Sayı Basamakları',
            'Bölme ve Bölünebilme',
            'EBOB-EKOK',
            'Rasyonel Sayılar-Ondalık Sayılar',
            'Basit Eşitsizlikler',
            'Mutlak Değer',
            'Üslü Sayılar',
            'Köklü Sayılar',
            'Çarpanlara Ayırma',
            'Oran Orantı',
            'Denklem Çözme',
            'Problemler',
            'Kümeler-Kartezyen Çarpımı',
            'Fonksiyonlar',
            'Permütasyon',
            'Kombinasyon',
            'Binom',
            'Olasılık',
            'İstatistik',
            '2. Dereceden Denklemler',
            'Karmaşık Sayılar',
            'Polinomlar',
            'Mantık',
            'Veri Analizi',
        ];
        foreach ($mathTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $mathId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Türkçe
        $turkceId = DB::table('subjects')->where('name', 'Türkçe')->value('id');
        $turkceTopics = [
            'Sözcükte Anlam',
            'Cümlede Anlam',
            'Paragrafta Anlam',
            'Anlatım Biçimleri',
            'Ses Bilgisi',
            'Yazım Kuralları',
            'Noktalama İşaretleri',
            'Sözcükte Yapı',
            'Sözcük Türleri',
            'Edat-Bağlaç-Ünlem',
            'Fiil-Ek Fiil',
            'Fiilmsi',
            'Fİlde Çatı',
            'Deyim ve Atasözü',
            'Cümlenin Öğeleri',
            'Cümle Türleri',
            'Anlatım Bozuklukları',
        ];
        foreach ($turkceTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $turkceId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Geometri
        $geoId = DB::table('subjects')->where('name', 'Geometri')->value('id');
        $geoTopics = [
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
        foreach ($geoTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $geoId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Tarih
        $tarihId = DB::table('subjects')->where('name', 'Tarih')->value('id');
        $tarihTopics = [
            "Tarih Bilimine Giriş",
            "Uygarlığın Doğuşu ve İlk Uygarlıklar",
            "İlk Türk Devletleri",
            "İslam Tarihi ve Uygarlığı",
            "Türk-İslam Devletleri",
            "Türkler'in İslamiyeti Kabulü",
            "Türkiye Tarihi",
            "Beylikten Devlete (1300-1453)",
            "Dünya Gücü: Osmanlı Devleti",
            "Osmanlı Duraklama Dönemi",
            "Gerileme Devri (1699 – 1792)",
            "Arayış Yılları (17. Yüzyıl)",
            "Avrupa ve Osmanlı Devleti (18. Yüzyıl)",
            "En Uzun Yüzyıl (1800-1922)",
            "20.Yüzyıl Başlarında Osmanlı Devleti",
            "XIX. YY Osmanlı Devleti",
            "1.Dünya Savaşı – Milli Mücadeleye Hazırlık D.",
            "Kurtuluş Savaşında Cepheler",
            "Türk İnkılabı",
            "Atatürkçülük ve Atatürk İlkeleri",
            "Türk Dış Politikası",
        ];
        foreach ($tarihTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $tarihId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Fizik
        $fizikId = DB::table('subjects')->where('name', 'Fizik')->value('id');
        $fizikTopics = [
            'Fizik Bilimine Giriş',
            'Madde ve Özellikleri',
            'Kuvvet ve Hareket',
            'İş, Güç ve Enerji',
            'Isı, Sıcaklık ve Genleşme',
            'Basınç',
            'Kaldırma Kuvveti',
            'Elektrik ve Manyetizma',
            'Dalgalar',
            'Optik',
        ];
        foreach ($fizikTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $fizikId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Din Kültürü ve Ahlak Bilgisi
        $dinId = DB::table('subjects')->where('name', 'Din Kültürü ve Ahlak Bilgisi')->value('id');
        $dinTopics = [
            "İnsan ve Din (İnanç)",
            "İbadet",
            "Hz. Muhammed'in Hayatı",
            "Vahiy ve Akıl",
            "İslam Düşüncesi ve Yorumu",
            "İslamda Değerler, Sanat ve Laiklik",
            "Yaşayan Dinler",
        ];
        foreach ($dinTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $dinId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Felsefe
        $felsefeId = DB::table('subjects')->where('name', 'Felsefe')->value('id');
        $felsefeTopics = [
            "Felsefe'nin Alanı",
            "Bilgi Felsefesi",
            "Bilim Felsefesi",
            "Varlık Felsefesi",
            "Ahlak Felsefesi",
            "Siyaset Felsefesi",
            "Sanat Felsefesi",
            "Din Felsefesi",
        ];
        foreach ($felsefeTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $felsefeId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Biyoloji
        $biyolojiId = DB::table('subjects')->where('name', 'Biyoloji')->value('id');
        $biyolojiTopics = [
            "Yaşam Bilimi Biyoloji",
            "Hücre",
            "Canlılar Dünyası",
            "Hücre Bölünmeleri ve Üreme",
            "Kalıtımın Genel İlkeleri",
            "Ekosistem Ekolojisi ve Güncel Çevre Sorunları",
        ];
        foreach ($biyolojiTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $biyolojiId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Kimya
        $kimyaId = DB::table('subjects')->where('name', 'Kimya')->value('id');
        $kimyaTopics = [
            "Kimya Bilimi",
            "Atom ve Periyodik Sistem",
            "Kimyasal Türler Arası Etkileşimler",
            "Maddenin Halleri",
            "Doğa ve Kimya",
            "Kimyanın Temel Kanunları ve Kimyasal Hesaplamalar",
            "Karışımlar",
            "Asitler-Bazlar ve Tuzlar",
            "Kimya Her Yerde",
        ];
        foreach ($kimyaTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $kimyaId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Coğrafya
        $cografyaId = DB::table('subjects')->where('name', 'Coğrafya')->value('id');
        $cografyaTopics = [
            "İnsan ve Doğa",
            "Dünya'nın Şekli ve Hareketleri",
            "Coğrafi Konum",
            "Harita Bilgisi",
            "Atmosfer ve Sıcaklık",
            "İklimler",
            "Basınç ve Rüzgarlar",
            "Nem, Yağış ve Buharlaşma",
            "İç Kuvvetler / Dış Kuvvetler",
            "Su – Toprak ve Bitkiler",
            "Nüfus-Göç-Yerleşme",
            "Türkiye'nin Yer Şekilleri",
            "Ekonomik Faaliyetler",
            "Bölgeler ve Ülkeler",
            "Uluslararası Ulaşım Hatları",
            "Çevre ve Toplum",
            "Doğal Afetler",
        ];
        foreach ($cografyaTopics as $title) {
            DB::table('topics')->insert([
                'lesson_id' => $cografyaId,
                'title' => $title,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
