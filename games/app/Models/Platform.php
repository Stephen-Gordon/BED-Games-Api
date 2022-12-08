<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'platform_developer','description'];

    public function games()
    {
        return $this->belongstoMany(Game::class)->withTimestamps();
        //return $this->belongstoMany(Game::class, 'platform_game', 'game_id', 'platform_id');
    }
}
