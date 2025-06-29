<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Lending;
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
            'name' => 'Maria Liliane',
            'email' => 'lilianebasilio1997@gmail.com'
        ]);

        $user = User::factory()->create([
            'name' => 'Juan Farias',
            'email' => 'juanfarias580@gmail.com',
        ]);

        $publisher = Publisher::factory()
            ->create([
                'name' => 'Cultrix',
                'user_id' => $user->id
            ]);
        
        Book::factory(10)->create([
            'publisher_id' => $publisher->id,
            'user_id' => $user->id
        ]);

        Reader::factory(10)->create([
            'user_id' => $user->id
        ]);
    }
}
