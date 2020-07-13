<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FitnessUrlResource extends JsonResource
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
            'fitness_url_id' => $this->id,
            'url_name'       => $this->url_name,
            'url_address'    => $this->url_address
        ];
    }
}
