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

//        dd($posts);
//        dump($posts);

        return view("posts.index", ["posts"=>$posts]);
    }

    function create(){
        return view("posts.create");
    }

    function  store(){
//        @dd($_REQUEST);
        # use helper method request
//        $request_data = request();
//        dd($request_data);
        $request_data = request()->all();  # array can see the request parameters in
//        dd($request_data);
//        return "Added";
//        return redirect()->route("posts.index");
//        from laravel 9
        return to_route("posts.index");
    }


    function show($post){
        return $post;
    }
}
