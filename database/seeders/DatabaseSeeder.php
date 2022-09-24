<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Idea;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        Category::factory()->create(['name' => 'Category1']);
        Category::factory()->create(['name' => 'Category2']);
        Category::factory()->create(['name' => 'Category3']);
        Category::factory()->create(['name' => 'Category4']);

        Idea::factory(30)->create();

    }
}
