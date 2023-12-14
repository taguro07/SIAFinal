<?php

namespace Database\Factories;

use Faker\Generator as Faker;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rental>
 */
class RentalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::pluck('id')),
            'book_id' => fake()->randomElement(Book::pluck('id')),
            'rental_date' => now (),
            'return_date' => fake()->dateTime(),
        ];
    }
}
