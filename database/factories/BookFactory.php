<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'publisher_id' => $this->faker->ulid(),
            'title' => $this->faker->sentence(),
            'subtitle' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'publication_year' => $this->faker->year(),
            'edition' => $this->faker->sentence(),
        ];
    }
}
