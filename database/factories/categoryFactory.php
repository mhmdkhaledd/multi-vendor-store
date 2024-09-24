<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class categoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name=$this->faker->words(5,true);

        return [
            'name'=>$name,
            'slug'=>str::slug($name),
            'description'=>$this->faker->sentence(15),
            'image' =>$this->faker->imageUrl,
        ];
    }
}
