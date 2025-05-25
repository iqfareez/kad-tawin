<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MajlisDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('majlis_details')->insert([
            'title' => 'Undangan Perkahwinan',
            'pengantin_lelaki_full_name' => 'Muhammad Fareez Iqmal bin Mohd Sharipuddin',
            'pengantin_perempuan_full_name' => 'Nur Farah Najwa binti Mahadzir',
            'pengantin_lelaki_display_name' => 'Fareez',
            'pengantin_perempuan_display_name' => 'Najwa',
            'pengantin_lelaki_first' => true,
            'bapa_name' => 'Mohd Sharipuddin bin Mohd Isa',
            'ibu_name' => 'Rosnani binti Hasmuni',
            'majlis_date' => Carbon::parse('2025-07-05'),
            'majlis_time' => '12:00 tengahari - 4:00 petang',
            'majlis_start_time' => '12:00:00',
            'majlis_end_time' => '16:00:00',
            'majlis_date_hijri' => '9 Muharam 1447H',
            'venue_address_line_1' => 'Kompleks Komuniti Muhibbah,',
            'venue_address_line_2' => "76, Jalan 4/155. Bukit OUG,\n58200 W.P. Kuala Lumpur.",
            'venue_google_maps_url' => 'https://maps.app.goo.gl/cxo1PtFGRFUHzNU96',
            'theme' => 1,
            'slug' => 'fareez-najwa',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('majlis_details')->insert([
            'title' => 'Walimatul Urus',
            'pengantin_lelaki_full_name' => 'Muhammad Fareez Iqmal bin Mohd Sharipuddin',
            'pengantin_perempuan_full_name' => 'Nur Farah Najwa binti Mahadzir',
            'pengantin_lelaki_display_name' => 'Fareez',
            'pengantin_perempuan_display_name' => 'Najwa',
            'pengantin_lelaki_first' => false,
            'bapa_name' => 'Mahadzir Bin Ahmad',
            'ibu_name' => 'Hjh Norazlina Binti Arbaain',
            'majlis_date' => Carbon::parse('2025-06-28'),
            'majlis_time' => '12:00 tengahari - 4:00 petang',
            'majlis_start_time' => '12:00:00',
            'majlis_end_time' => '16:00:00',
            'majlis_date_hijri' => '2 Muharam 1447H',
            'venue_address_line_1' => 'No 31, Jalan Mawar 1/2,',
            'venue_address_line_2' => "Persiaran Amanjaya 4,\nSg Lalang,\n08000 Sg Petani, Kedah.",
            'venue_google_maps_url' => 'https://maps.app.goo.gl/Yr77Y3zCAZKa8zBn6',
            'theme' => 2,
            'slug' => 'najwa-fareez',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
