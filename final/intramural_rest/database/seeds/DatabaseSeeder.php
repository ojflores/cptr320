<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call('StudentsTableSeeder');
        $this->call('TeamsTableSeeder');
        $this->call('PlayersTableSeeder');
    }
}
