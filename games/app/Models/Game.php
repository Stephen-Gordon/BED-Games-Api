<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'description', 'publisher', 'platform', 'category', 'price', 'likes' , 'store_id'];
    

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
