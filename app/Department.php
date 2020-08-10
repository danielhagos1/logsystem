<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
   protected $fillable = ['dname'];
  
  public function company(){
     return $this->belongsToMany(Company::class);
  }
  
  public function user(){
     return $this->belongsTo(User::class);
  }
 
}