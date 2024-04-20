<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username'=>$this->faker->unique()->userName(),
            'email'=>$this->faker->unique()->email(),
            'password'=>$this->faker->password(),
            'descrip'=>$this->faker->paragraph(),
            'twitter'=>$this->faker->optional()->word(),
            'facebook'=>$this->faker->optional()->word(),
            'instagram'=>$this->faker->optional()->word(),
        ];
    }
}
