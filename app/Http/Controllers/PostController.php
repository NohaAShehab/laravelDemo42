<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public  $posts= [
        ["id"=>1, "title"=>"post 1", "description"=>"post1 desc", "user_id"=>1 ],
        ["id"=>2, "title"=>"post 2", "description"=>"post2 desc", "user_id"=>2 ],
        ["id"=>3, "title"=>"post 3", "description"=>"post3 desc", "user_id"=>3 ],
        ["id"=>4, "title"=>"post 4", "description"=>"post4 desc", "user_id"=>4 ]

    ];
    function index(){

        $posts= Post::all();
//        dd($posts);
//        dump($posts);
//        dd($posts);
        return view("posts.index", ["posts"=>$posts]);
    }

    function create(){
        return view("posts.create");
    }

    function  store(){
        #mass assigmnet
        $title= request("title");
        $desc= request("description");
//        Post::create(
//            ["title"=>$title,
//            "description"=>$desc]
//        );

        Post::create(request()->all());
        return to_route("posts.index");
    }


    function show($post){
//        $post= Post::find($post);  # object from model
//        $post =Post::where("id",$post);  # collection =-- no need
//        $post =Post::where("id",$post)->first();  # collection =-- no need

        dd($post);

        return $post;
    }
}
