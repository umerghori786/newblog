<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AmazonBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>rand(1,15),
            'title'=>$this->faker->name(),
            'filename'=>$this->faker->name(),
            'image_url'=>$this->faker->imageUrl(),
            'author_name'=>$this->faker->name(),
            'slogan'=>$this->faker->name(),
            'description'=>$this->faker->paragraph(),
            'is_amazon_account'=>rand(0,1),
            'amazon_email'=>$this->faker->unique()->safeEmail(),
            'amazon_password'=>'password',
        ];
    }
}
