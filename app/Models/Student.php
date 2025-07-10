<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function scopeMale($query){
        return $query->where('gender', 'male');
    }
}
