<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsenceType extends Model
{
  public function absences(){
    return $this->hasMany(Absence::class);
  }
}
