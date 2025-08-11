<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//            $table->foreignIdFor(Employer::class);
//        $table->string('title');
//        $table->string('salary');
//        $table->string('location');
//        $table->string('schedule')->default('Full Time');
//        $table->string('url');
//        $table->string('featured')->default(false);
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle,
            'salary' => fake()->randomElement(['Bs 10.000', 'Bs 55.000', 'Bs 69.000']),
            'location' => fake()->randomElement(['Japan', 'USA', 'Bolivia']),
            'schedule' => fake()->randomElement(['Full Time', 'Local']),
            'url' => fake()->url,
            'featured' => fake()->randomElement([true, false])
        ];
    }
}
