<?php

class BasicTest extends TestCase
{
    public function testDisplay()
    {
        $this->cisit('/players')
            ->see('Players')
            ->dontSee('Beta');
    }
}

class ProductTest extends TestCase
{
    /**
     * /products [GET]
     */
    public function testShouldReturnAllProducts(){
        $this->get("products", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ],
            'meta' => [
                '*' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links',
                ]
            ]
        ]);
        
    }
    /**
     * /products/id [GET]
     */
    public function testShouldReturnProduct(){
        $this->get("products/2", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }
    /**
     * /products [POST]
     */
    public function testShouldCreateProduct(){
        $parameters = [
            'product_name' => 'Infinix',
            'product_description' => 'NOTE 4 5.7-Inch IPS LCD (3GB, 32GB ROM) Android 7.0 ',
        ];
        $this->post("products", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }
    
    /**
     * /products/id [PUT]
     */
    public function testShouldUpdateProduct(){
        $parameters = [
            'product_name' => 'Infinix Hot Note',
            'product_description' => 'Champagne Gold, 13M AF + 8M FF 4G Smartphone',
        ];
        $this->put("products/4", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'product_name',
                    'product_description',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
    }
    /**
     * /products/id [DELETE]
     */
    public function testShouldDeleteProduct(){
        
        $this->delete("products/5", [], []);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}



// use Laravel\Lumen\Testing\DatabaseMigrations;
// use Laravel\Lumen\Testing\DatabaseTransactions;

// class test1 extends TestCase
// {
//     use DatabaseMigrations;

//     /**
//      * Test the list endpoint for terms.
//      *
//      * @return void
//      */
//     public function test_List()
//     {
//         //Create new term
//         $term = factory('App\Term')->create();

//         //Send GET request
//         $this->get('api/v2/terms');
//         //test response
//         $this->seeStatusCode(200);
//         $this->seeJsonStructure([
//             'data' => ['*' =>
//                 [
//                     'id',
//                     'credits',

// use Laravel\Lumen\Testing\DatabaseMigrations;
// use Laravel\Lumen\Testing\DatabaseTransactions;

// class test1 extends TestCase
// {
//     use DatabaseMigrations;

//     /**
//      * Test the list endpoint for terms.
//      *
//      * @return void
//      */
//     public function test_List()
//     {
//         //Create new term
//         $term = factory('App\Term')->create();

//         //Send GET request
//         $this->get('api/v2/terms');
//         //test response
//         $this->seeStatusCode(200);
//         $this->seeJsonStructure([
//             'data' => ['*' =>
//                 [
//                     'id',
//                     'credits',
//                     'term_name',
//                     'start_date',
//                     'end_date'
//                 ]
//             ]
//         ]);
//     }

//     /**
//      * Test the create endpoint for terms
//      * 
//      * @return void
//      */

//     public function test_Create()
//     {
//         // send POST  request
//         $body = [
//             'term_name' => "TST19",
//             'credits' => 11,
//             'start_date' => "2019-01-01",
//             'end_date' => "2019-03-15",
//         ];
//         $this->post('/api/v2/terms', $body);
//         //test database
//         $newTerm = App\Term::where('id', 1)->first();
//         $this->assertEquals($body['term_name'], $newTerm->term_name);
//         $this->assertEquals($body['credits'], $newTerm->credits);
//         $this->assertEquals($body['start_date'], $newTerm->start_date);
//         $this->assertEquals($body['end_date'], $newTerm->end_date);
//         //Test response
//         $this->seeStatusCode(201);
//         $this->seeJsonEquals([
//             'term' => [
//                 'id' => 1,
//                 'credits' => $body['credits'],
//                 'term_name' => $body['term_name'],
//                 'start_date' => $body['start_date'],
//                 'end_date' => $body['end_date'],
//                 'updated_at' => $newTerm->updated_at->format('Y-m-d H:i:s'),
//                 'created_at' => $newTerm->created_at->format('Y-m-d H:i:s')
//             ]
//         ]);
//     }

//     /**
//      * Test the read endpoint for terms
//     * 
//     *@return void
//     */

//     public function test_Read()
//     {
//         //Create new term
//         $term = factory('App\Term')->create();
//         //Send GET request
//         $this ->get('api/v2/terms/' . $term->id);
//         //test response
//         $this->seeStatusCode(200);
//         $this->seeJsonEquals([
//             'term' => [
//                 'id' => $term->id,
//                 'credits' => $term->credits,
//                 'term_name' => $term->term_name,
//                 'start_date' => $term->start_date,
//                 'end_date' => $term->end_date,
//                 'updated_at' => $term->updated_at->format('Y-m-d H:i:s'),
//                 'created_at' => $term->created_at->format('Y-m-d H:i:s')
//             ]
//         ]);
//     }

//     /**
//      * 
//      * @return void
//      */

//     public function test_Update(){
//         //create new term
//         $term = factory('App\Term')->create();
//         //Send PUT request
//         $body = [
//             'term_name' => 'SPR19',
//             'credits' => 12,
//             'start_date' => "2019-01-07",
//             'end_date' => "2019-03-16"
//         ];
//         $this->put('/api/v2/terms/' . $term->id, $body);
//         //test database
//         $newTerm = App\Term::where('id', 1)->first();
//         $this->assertEquals($body['term_name'], $newTerm->term_name);
//         $this->assertEquals($body['credits'], $newTerm->credits);
//         $this->assertEquals($body['start_date'], $newTerm->start_date);
//         $this->assertEquals($body['end_date'], $newTerm->end_date);
//         //Test response
//         $this->seeStatusCode(200);
//         $this->seeJsonEquals([
//             'term' => [
//                 'id' => 1,
//                 'credits' => $body['credits'],
//                 'term_name' => $body['term_name'],
//                 'start_date' => $body['start_date'],
//                 'end_date' => $body['end_date'],
//                 'updated_at' => $term->updated_at->format('Y-m-d H:i:s'),
//                 'created_at' => $term->created_at->format('Y-m-d H:i:s')
//             ]
//         ]);
//     }

//     /**
//      * 
//      * @return void
//      */
    
//     public function test_Destroy()
//     {
//         //create new term
//         $term = factory('App\Term')->create();
//         //send DELETE request
//         $this->delete('api/v2/terms/' . $term->id);
//         //test database
//         $this->assertFalse(App\Reduction::where('id', 1)->exists());
//         //test response
//         $this->seeStatusCode(204);
//     } 
//                     'term_name',
//                     'start_date',
//                     'end_date'
//                 ]
//             ]
//         ]);
//     }

//     /**
//      * Test the create endpoint for terms
//      * 
//      * @return void
//      */

//     public function test_Create()
//     {
//         // send POST  request
//         $body = [
//             'term_name' => "TST19",
//             'credits' => 11,
//             'start_date' => "2019-01-01",
//             'end_date' => "2019-03-15",
//         ];
//         $this->post('/api/v2/terms', $body);
//         //test database
//         $newTerm = App\Term::where('id', 1)->first();
//         $this->assertEquals($body['term_name'], $newTerm->term_name);
//         $this->assertEquals($body['credits'], $newTerm->credits);
//         $this->assertEquals($body['start_date'], $newTerm->start_date);
//         $this->assertEquals($body['end_date'], $newTerm->end_date);
//         //Test response
//         $this->seeStatusCode(201);
//         $this->seeJsonEquals([
//             'term' => [
//                 'id' => 1,
//                 'credits' => $body['credits'],
//                 'term_name' => $body['term_name'],
//                 'start_date' => $body['start_date'],
//                 'end_date' => $body['end_date'],
//                 'updated_at' => $newTerm->updated_at->format('Y-m-d H:i:s'),
//                 'created_at' => $newTerm->created_at->format('Y-m-d H:i:s')
//             ]
//         ]);
//     }

//     /**
//      * Test the read endpoint for terms
//     * 
//     *@return void
//     */

//     public function test_Read()
//     {
//         //Create new term
//         $term = factory('App\Term')->create();
//         //Send GET request
//         $this ->get('api/v2/terms/' . $term->id);
//         //test response
//         $this->seeStatusCode(200);
//         $this->seeJsonEquals([
//             'term' => [
//                 'id' => $term->id,
//                 'credits' => $term->credits,
//                 'term_name' => $term->term_name,
//                 'start_date' => $term->start_date,
//                 'end_date' => $term->end_date,
//                 'updated_at' => $term->updated_at->format('Y-m-d H:i:s'),
//                 'created_at' => $term->created_at->format('Y-m-d H:i:s')
//             ]
//         ]);
//     }

//     /**
//      * 
//      * @return void
//      */

//     public function test_Update(){
//         //create new term
//         $term = factory('App\Term')->create();
//         //Send PUT request
//         $body = [
//             'term_name' => 'SPR19',
//             'credits' => 12,
//             'start_date' => "2019-01-07",
//             'end_date' => "2019-03-16"
//         ];
//         $this->put('/api/v2/terms/' . $term->id, $body);
//         //test database
//         $newTerm = App\Term::where('id', 1)->first();
//         $this->assertEquals($body['term_name'], $newTerm->term_name);
//         $this->assertEquals($body['credits'], $newTerm->credits);
//         $this->assertEquals($body['start_date'], $newTerm->start_date);
//         $this->assertEquals($body['end_date'], $newTerm->end_date);
//         //Test response
//         $this->seeStatusCode(200);
//         $this->seeJsonEquals([
//             'term' => [
//                 'id' => 1,
//                 'credits' => $body['credits'],
//                 'term_name' => $body['term_name'],
//                 'start_date' => $body['start_date'],
//                 'end_date' => $body['end_date'],
//                 'updated_at' => $term->updated_at->format('Y-m-d H:i:s'),
//                 'created_at' => $term->created_at->format('Y-m-d H:i:s')
//             ]
//         ]);
//     }

//     /**
//      * 
//      * @return void
//      */
    
//     public function test_Destroy()
//     {
//         //create new term
//         $term = factory('App\Term')->create();
//         //send DELETE request
//         $this->delete('api/v2/terms/' . $term->id);
//         //test database
//         $this->assertFalse(App\Reduction::where('id', 1)->exists());
//         //test response
//         $this->seeStatusCode(204);
//     } 
