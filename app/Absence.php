<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
  public function employee(){
    return $this->belongsTo(Employee::class);
  }

  public function absenceType(){
    return $this->belongsTo(AbsenceType::class);
  }
}
