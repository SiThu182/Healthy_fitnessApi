<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Category;
class FoodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'food_id'        => $this->id,
            'food_name'    => $this->food_name,
            'calories'  => $this->calories,
            'food_image'=> $this->food_image,
            'category' => new CategoryResource(Category::find($this->category_id))
        ];
    }
}
