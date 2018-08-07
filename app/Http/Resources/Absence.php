<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Absence extends JsonResource
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
        'id'                => $this->id,
        'from'              => $this->from,
        'to'                => $this->to,
        'employee_id'       => $this->employee_id,
        'employee_name'     => $this->employee->first_name . ' ' . $this->employee->last_name,
        'absence_type_id'   => $this->absence_type_id,
        'absence_type_name' => $this->absenceType->name
      ];
    }
}
