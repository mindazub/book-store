<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'cover' => 'https://via.placeholder.com/340/440',
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'discount' => $this->faker->numberBetween($min = 1, $max = 90),
        ];
    }
}
