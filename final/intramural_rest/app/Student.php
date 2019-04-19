<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'first_name', 'last_name', 'preferred_name', 'email', 'graduation_year', 'birth_date'
    ];
}
