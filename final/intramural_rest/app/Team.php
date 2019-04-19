<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //keeps the id from conflicting on the database end
    protected $primaryKey = 'team_id';
    protected $fillable = [
        'team_name', 'team_id'
    ];
}
