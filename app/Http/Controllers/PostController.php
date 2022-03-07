<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


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

        $posts= Post::paginate(5);
        return view("posts.index", ["posts"=>$posts]);
    }

    function create(){
        $users = User::all();
        return view("posts.create",["users"=>$users]);
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

    function destroy($post){
        $deleted= Post::findOrFail($post);
        $deleted->delete();
        return to_route("posts.index");
    }


}
