<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence('3',false),
            'slug' => $this->faker->unique()->slug,
            'summary' => $this->faker->text,
            'photo' => $this->faker->imageUrl('400','200'),
            'description' => $this->faker->text,
             'stock' => $this->faker->numberBetween(2,10),
             'brand_id' => $this->faker->randomElement(Brand::pluck('id')->toArray()),
             'vendor_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
             'cat_id' => $this->faker->randomElement(Category::where('is_parent',1)->pluck('id')->toArray()),
             'child_cat_id' => $this->faker->randomElement(Category::where('is_parent',0)->pluck('id')->toArray()),
              'price' => $this->faker->randomDigitNotNull ,
              'offer_price' => $this->faker->randomDigitNotNull ,
              'discount' => $this->faker->randomDigitNotNull ,
              'size' => $this->faker->randomElement(['S','M','L']),
              'conditions' => $this->faker->randomElement(['new','popular','winter']),



            'status' => $this->faker->randomElement(['active','inactive'])
        ];
    }
}
