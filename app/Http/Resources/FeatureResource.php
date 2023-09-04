<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FeatureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    
     public function toArray($request)
     {
         return [
             'id' => $this->id,
             'name' => $this->name,
             'icon' => $this->icon,
         ];
     }
}
