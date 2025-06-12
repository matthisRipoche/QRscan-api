<?php

namespace Database\Seeders;

use App\Models\Badge;
use App\Models\Event;
use App\Models\TypeAcces;
use App\Models\PointAcces;
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

        //creer 3 type acces VIP Partenaires et public
        TypeAcces::create(['name' => 'VIP']);
        TypeAcces::create(['name' => 'Partenaires']);
        TypeAcces::create(['name' => 'Public']);


        Event::factory()->count(10)->create();

        //creer 2 points d acces pour l evenement d id 1
        PointAcces::create(['name' => 'Point d accès VIP', 'event_id' => 1, 'type_acces_id' => 1]);
        PointAcces::create(['name' => 'Point d accès Public', 'event_id' => 1, 'type_acces_id' => 3]);

        //creer 2 points d acces pour l evenement d id 2
        PointAcces::create(['name' => 'Point d accès Partenaires', 'event_id' => 2, 'type_acces_id' => 2]);
        PointAcces::create(['name' => 'Point d accès Public', 'event_id' => 2, 'type_acces_id' => 3]);

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
