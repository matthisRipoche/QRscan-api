<?php

namespace Database\Factories;

use App\Models\Badge;
use Illuminate\Database\Eloquent\Factories\Factory;

class BadgeFactory extends Factory
{
    protected $model = Badge::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->ean8(), // Code EAN8 unique
            'status' => $this->faker->word(), // Statut du badge
            'last_import' => $this->faker->dateTimeThisYear(), // Date d'import cette année
        ];
    }
}
