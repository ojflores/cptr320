<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('player_id');
            $table->string('first_name', 255)->nullable($value = true);
            $table->string('last_name', 255)->nullable($value = true);
            $table->integer('team_id')->nullable($value = true);
            $table->integer('free_agent'); 
            
            //examples
            //$table->string('preferred_name', 255)->nullable($value = true);
            //$table->integer('graduation_year')->nullable($value = true);
            //$table->date('birth_date')->nullable($value = true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
