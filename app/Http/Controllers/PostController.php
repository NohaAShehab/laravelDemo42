<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    function index(){
        $posts= [
            ["id"=>1, "title"=>"post 1", "description"=>"post1 desc", "user_id"=>1 ],
            ["id"=>2, "title"=>"post 2", "description"=>"post2 desc", "user_id"=>2 ],
            ["id"=>3, "title"=>"post 3", "description"=>"post3 desc", "user_id"=>3 ],
            ["id"=>4, "title"=>"post 4", "description"=>"post4 desc", "user_id"=>4 ]

        ];

        return view("posts.index", ["posts"=>$posts]);
    }
}
