<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vacation extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /* return parent::toArray($request); */
      return [
        'id'          => $this->id,
        'from'        => $this->from,
        'to'          => $this->to,
        'employee_id' => $this->employee_id,
        'employee'    => $this->employee->first_name. ' ' . $this->employee->last_name
      ];
    }
}
