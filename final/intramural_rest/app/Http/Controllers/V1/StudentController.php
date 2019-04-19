<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StudentController extends Controller
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
                {"id":1,"first_name":"Willard","last_name":"Bailey","preferred_name":"Rosalia","graduation_year":2020,"email":"vtoy@example.net","birth_date":"1998-03-14","created_at":"2016-07-19 07:24:43","updated_at":"2018-04-13 13:53:52"},
                {"id":2,"first_name":"Nora","last_name":"Ferry","preferred_name":"Talia","graduation_year":2021,"email":"jarrod.mcclure@example.com","birth_date":"2000-03-26","created_at":"2014-11-28 21:32:09","updated_at":"2018-09-08 18:41:53"},
                {"id":3,"first_name":"Orin","last_name":"Kassulke","preferred_name":"Loy","graduation_year":2021,"email":"sauer.eloisa@example.com","birth_date":"1999-12-12","created_at":"2014-03-18 21:45:29","updated_at":"2018-05-07 17:40:07"}
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
            'id' => 1
        ];
    }

}
