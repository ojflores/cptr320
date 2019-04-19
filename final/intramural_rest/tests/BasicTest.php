<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class BasicTest extends TestCase
{

    public function testApplication()
    {
        $response = $this->call('GET', '/players');

        $this->assertequals(200, $response->status());

    }


    /**
     * Test the read endpoint for players
    * 
    *@return void
    */

    public function test_Read()
    {
        // //Create new player
        // $player = factory('App\players')->create();
        //Send GET request
        $this ->get('api/v2/players/' . $players->id);
        //test response
        $this->seeStatusCode(200);
        $this->seeJsonEquals([
            'players' => [
                'id' => $player->id,
                'player_name' => $players->player_name,
                'updated_at' => $players->updated_at->format('Y-m-d H:i:s'),
                'created_at' => $players->created_at->format('Y-m-d H:i:s')
            ]
        ]);
    }




    /**
     * Test the list endpoint for players.
     *
     * @return void
     */
    public function test_List()
    {
        //Create new player
        $player = factory('App\player')->create();

        //Send GET request
        $this->get('api/v2/players');
        //test response
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'player' => ['*' =>
                [
                    'id',
                ]
            ]
        ]);
    }

        /**
     * Test the create endpoint for players
     * 
     * @return void
     */

    public function test_Create()
    {
        // send POST  request
        $body = [
            'player_name' => "TST19",
            'credits' => 11,
            'start_date' => "2019-01-01",
            'end_date' => "2019-03-15",
        ];
        $this->post('/api/v2/players', $body);
        //test database
        $newplayer = App\player::where('id', 1)->first();
        $this->assertEquals($body['player_name'], $newplayer->player_name);

        //Test response
        $this->seeStatusCode(201);
        $this->seeJsonEquals([
            'player' => [
                'id' => 1,
                'player_name' => $body['player_name'],
                'updated_at' => $newplayer->updated_at->format('Y-m-d H:i:s'),
                'created_at' => $newplayer->created_at->format('Y-m-d H:i:s')
            ]
        ]);
    }
}