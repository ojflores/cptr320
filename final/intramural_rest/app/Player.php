<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //keeps the player_id from conflicting with id on the database end
    protected $primaryKey = 'player_id';
    protected $fillable = [
        'player_id', 'first_name', 'last_name', 'team_id', 'free_agent'
    ];
}
