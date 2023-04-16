<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualification>
 */
class QualificationFactory extends Factory
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
            'college_name' => $this->faker->sentence,
            'program_name' => $this->faker->sentence,
            'url' => $this->faker->url,
            'location' => $this->faker->sentence,
            'started_at' =>$this->faker->date, 
            'ended_at' =>$this->faker->date, 
        ];
    }
}
