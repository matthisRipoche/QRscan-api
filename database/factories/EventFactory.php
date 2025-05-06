<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3), // Nom de l'évènement (phrase aléatoire)
            'date' => $this->faker->dateTimeBetween('-1 years', '+1 year'), // Date entre 1 an dans le passé et 1 an dans le futur
        ];
    }
}
