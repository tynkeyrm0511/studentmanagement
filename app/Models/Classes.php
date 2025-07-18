<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
