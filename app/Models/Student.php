<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'gender', 'dob', 'email', 'phone', 'class_id'];
    public function scopeMale($query){
        return $query->where('gender', 'male');
    }
}
