<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $divs = [];
      foreach ( $this->divisions as $division ){
        array_push($divs, $division);
      }

      return [
        'id'          => $this->id,
        'first_name'  => $this->first_name,
        'last_name'   => $this->last_name,
        'divisions'   => $divs
      ];
    }
}
