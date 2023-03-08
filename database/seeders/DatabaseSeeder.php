<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\Hour;
use App\Models\Service;
use App\Models\User;
use Nette\Utils\Random;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        /* Client::factory(10)
            ->hasUser(5)
            ->hasService(5)
            ->hasHour(4)
            ->create(); */
        
        //User::factory()->count(10)->create();

        //Hour::factory()->count(6)->create();

        //Service::factory()->count(6)->create();

        Client::factory(10)
                ->hasUser(5)
                ->hasHour(4)
                ->hasAttached(Service::factory()->count(2), ['precio' => rand(5, 250)])
                ->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
