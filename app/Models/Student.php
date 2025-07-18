<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'gender', 'dob', 'email', 'phone', 'class_id'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
