<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     */
    public function unverified()
    {
        //
    }
}
