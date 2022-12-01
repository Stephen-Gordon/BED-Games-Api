<?php

namespace Database\Factories;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GamePlatformFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $authors = Author::all();
        // $books = Book::all();

        // return [
        //     'author_id' => $authors->random()->id,
        //     'book_id' => $books->random()->id
        // ];
    }
}