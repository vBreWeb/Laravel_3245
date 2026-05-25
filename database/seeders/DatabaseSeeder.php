<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       // 1. Admin
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Categories
        $seminar = \App\Models\Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $entertainment = \App\Models\Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        $competition = \App\Models\Category::create([
            'name' => 'Competition',
            'slug' => 'competition',
        ]);

        // 3. Events

        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain UI/UX modern bersama mentor profesional.',
            'date' => '2026-05-01 09:00:00',
            'location' => 'Auditorium Amikom',
            'price' => 75000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $seminar->id,
            'title' => 'AI & Future Tech Summit 2026',
            'description' => 'Seminar teknologi AI dan masa depan digital.',
            'date' => '2026-05-03 13:00:00',
            'location' => 'Cinema Unit 6',
            'price' => 50000,
            'stock' => 120,
            'poster_path' => 'posters/event-2.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $competition->id,
            'title' => 'E-Sport U-Champ',
            'description' => 'Turnamen e-sport antar mahasiswa.',
            'date' => '2026-05-05 10:00:00',
            'location' => 'Sport Hall',
            'price' => 25000,
            'stock' => 200,
            'poster_path' => 'posters/event-3.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $competition->id,
            'title' => 'Hackathon 2026',
            'description' => 'Kompetisi coding dan inovasi teknologi.',
            'date' => '2026-05-08 08:00:00',
            'location' => 'Inkubator Amikom',
            'price' => 50000,
            'stock' => 80,
            'poster_path' => 'posters/event-4.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Jazz Night 2026',
            'description' => 'Malam hiburan musik jazz bersama guest star.',
            'date' => '2026-05-10 19:00:00',
            'location' => 'Amikom Baru',
            'price' => 50000,
            'stock' => 150,
            'poster_path' => 'posters/event-5.png',
        ]);

        \App\Models\Event::create([
            'category_id' => $entertainment->id,
            'title' => 'Korean Culture Festival',
            'description' => 'Festival budaya Korea dengan dance dan kuliner.',
            'date' => '2026-05-12 15:00:00',
            'location' => 'Lapangan Kampus',
            'price' => 30000,
            'stock' => 250,
            'poster_path' => 'posters/event-6.png',
        ]);
    }
}
