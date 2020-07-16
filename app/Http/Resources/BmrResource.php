<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BmrResource extends JsonResource
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
            'user_id' => $this->user_id,
            'weight'  => $this->weight,
            'height'  => $this->height,
            'result'  => $this->result,
            'age'     => $this->age,
            'gender'  => $this->gender,
            'date'  => $this->date, 
        ];
    }
}
