<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = new Setting();
        $setting->site_title = "Seakomik";
        $setting->site_keywords = "Seataku, Seataku me, Komiku, Baca online komik bahasa indonesia, Baca Komik lengkap, Baca Manga, Baca Manhua, Baca Manhwa";
        $setting->site_description = "Seataku - Tempatnya Baca Komik Online Terlengkap Bahasa Indonesia, Baca Manga Bahasa Indonesia, Baca Manhwa Bahasa Indonesia, Baca Manhua Bahasa Indonesia";
        $setting->site_logo = "mangareader/images/Seataku.png";
        $setting->site_icon = "mangareader/images/Seataku.png";
        $setting->save();
    }
}
