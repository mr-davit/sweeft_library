<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()->create([
            'name' => 'Sweeft',
            'email' => 'test@Sweeft.ge',
        ]);

       $rand =
        Author::factory()
            // This tells the factory to create a relationship
            ->has(Book::factory()->count(rand(1,8)))
            ->count(10)
            ->create();
    }
}
