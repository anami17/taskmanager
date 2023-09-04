<?php

namespace Database\Factories;
 
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
 
class TaskFactory extends Factory
{   /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
      return [
           'title' => $this->faker->text(),
           'description' => $this->faker->realText($maxNbChars = 50),
          'status' => $this->faker->realText($maxNbChars = 50),
            'user_id' => 1

       ];
    }
} 