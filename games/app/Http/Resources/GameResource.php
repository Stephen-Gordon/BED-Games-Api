<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */






    /* The resource Class represents a model that needs to be turned into JSON  
    
    */



    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'publisher' => $this->publisher,
            'platform' => $this->platform,
            'category' => $this->category,
            'price' => $this->price,
            'likes' => $this->likes
        ];
    }
}


/* 
API Resources are templates where you define how you want the JSON data to be returned to the user when they send an API request. 
 */
