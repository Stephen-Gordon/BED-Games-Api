<?php

namespace Database\Seeders;

use App\Models\Platform;
use App\Models\Game;
use App\Models\Store;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Platform::factory()
        ->times(3)
        ->create();

        foreach(Platform::all() as $platform)
        {
            $games = Game::inRandomOrder()->take(rand(1,3))->pluck('id');
            $platform->games()->attach($games);
        }
    }
}
