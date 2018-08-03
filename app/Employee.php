<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  public function divisions(){
    return $this->belongsToMany(Division::class);
  }

  public function vacations(){
    return $this->hasMany(Vacation::class);
  }
}
