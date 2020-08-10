<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function department(){
        return $this->belongsToMany(Department::class)->with('timestamp');
    }
}