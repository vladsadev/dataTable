<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
//        $table->id();
//        $table->foreignIdFor(User::class);
//        $table->string('name');
//        $table->string('logo');
        return [
            'user_id' => User::factory(),
            'name' => fake()->company(),
            'logo' => fake()->imageUrl(),
        ];
    }
}
