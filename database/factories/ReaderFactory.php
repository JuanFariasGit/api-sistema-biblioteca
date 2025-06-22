<?php

namespace Database\Factories;

use Faker\Provider\pt_BR\Person;
use Faker\Provider\pt_BR\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory 
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {    
        $person = app(Person::class);
        $phoneNumber = app(PhoneNumber::class);

        return [
            'cpf' => $person->cpf(false),
            'full_name' => $this->faker->name,
            'cellphone' => $phoneNumber->cellphoneNumber(false),
            'zip_code' => $this->faker->numerify('#####-###'),
            'street' => $this->faker->streetAddress(),
            'neighborhood' => $this->faker->sentence(),
            'city' => $this->faker->sentence(),
            'state' => 'PE',
            'number' => 'SN'
        ];
    }
}
