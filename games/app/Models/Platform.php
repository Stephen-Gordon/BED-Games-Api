<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    public function games()
    {
        return $this->belongstoMany(Game::class)->withTimestamps();
        //return $this->belongstoMany(Game::class, 'platform_game', 'game_id', 'platform_id');
    }
}
