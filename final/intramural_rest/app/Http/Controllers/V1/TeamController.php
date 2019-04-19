<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_decode('{
            "data":[
                {"team_name": "Bobcats","team_id":1},
                {"team_name": "Otters","team_id":2},
                {"team_name": "Mavericks","team_id":3}
            ],
            "total":3
        }', true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return json_decode('{
            "data": {
                "first_name": " Dorcas",
                "last_name": " Towne",
                "preferred_name": " Mikel",
                "graduation_year": " 2023",
                "email": " theodore60@example.org",
                "birth_date": " 1999-07-20"
            }
        }', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return json_decode('{
            "student": {
                "id": 1,
                "first_name": "Willard",
                "last_name": "Bailey",
                "preferred_name": "Rosalia",
                "graduation_year": 2020,
                "email": "vtoy@example.net",
                "birth_date": "1998-03-14",
                "created_at": "2016-07-19 07:24:43",
                "updated_at": "2018-04-13 13:53:52"
            }
        }', true);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return json_decode('{
            "student": {
                "id": 1,
                "first_name": "Willard",
                "last_name": "Bailey",
                "preferred_name": "Rosalia",
                "graduation_year": 2020,
                "email": "vtoy@example.net",
                "birth_date": "1998-03-14",
                "created_at": "2016-07-19 07:24:43",
                "updated_at": "2018-04-13 13:53:52"
            }
        }', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return [
            'message' => 'deleted successfully',
            'team_id' => 1
        ];
    }

}
