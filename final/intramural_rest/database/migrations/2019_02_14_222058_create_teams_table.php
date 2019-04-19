<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->string('team_name', 255)->nullable($value = true);
            $table->increments('team_id');
            
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
        Schema::dropIfExists('teams');
    }
}
