<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Event::factory()->count(10)->create();

        $eventIds = Event::pluck('id')->toArray(); // Récupère tous les IDs des events existants

        Badge::factory()->count(50)->create([
            'event_id' => fn() => collect($eventIds)->random(),
        ]);



        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'token' => Str::random(32),
        ]);
    }
}
