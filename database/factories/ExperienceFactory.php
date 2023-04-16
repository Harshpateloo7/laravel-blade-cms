<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'job_title' => $this->faker->sentence,
            'company_name' => $this->faker->sentence,
            'location' => $this->faker->sentence,
            'start_date' => $this->faker->dateTimeThisMonth,
            'end_date' => $this->faker->dateTimeThisMonth,
            'description' => $this->faker->sentence,
            'url' => $this->faker->url,
        ];
    }
}
