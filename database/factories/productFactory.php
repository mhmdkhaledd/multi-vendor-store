<?php

namespace Database\Factories;

use App\Models\category;
use App\Models\product;
use App\Models\store;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
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
            'name' => $name,
            'slug' => str::slug($name),
            'description' =>$this->faker->sentence(15),
            'image' =>$this->faker->imageUrl(600,600),
            'price' => $this->faker->randomFloat(1,1,499),
            'compare_price' => $this->faker->randomFloat(1,500,999),
            'category_id'=> category::inRandomOrder()->first()->id,
            'featured' =>rand(0,1),
            'store_id'=> store::inRandomOrder()->first()->id,

        ];
    }
}
