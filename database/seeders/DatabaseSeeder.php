<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Publisher;
use App\Models\Reader;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Juan Farias',
            'email' => 'juanfarias580@gmail.com',
        ]);

        // Publisher::factory()
        //     ->has(Book::factory(3))
        //     ->create([
        //         'name' => 'Cultrix'
        //     ]);

        // Reader::factory(10)->create();
    }
}
