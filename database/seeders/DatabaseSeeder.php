<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        

        //Esto es un factory
        User::factory(5)
            ->has(Client::factory()->count(2))
            ->create();
        

        //Seeder
        User::factory()
            ->has(Client::factory()->count(5))
            ->create([
                'name'=>'Usuario de testeo',
                'email'=>'test@test.com'
            ]);
    }
}
