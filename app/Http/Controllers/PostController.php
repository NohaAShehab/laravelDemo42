<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;


class PostController extends Controller
{
    //
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
        request()->validate([
           "title"=>"required|min:5",
            "description"=>'required|min:10'
        ],
        [
            "title.required"=>"please provied title"
        ]
        );

        Post::create(request()->all());
        return to_route("posts.index");
    }


    function show($post){
        $postdata = Post::findOrFail($post);
        return view("posts.show",["post"=>$postdata]);
    }
    function edit($post){
        $data = Post::find($post);
        $users = User::all();
        return view("posts.edit",["post"=>$data,"users"=>$users ]);
    }

    function update($post){
        $updated = Post::findOrFail($post);
        $updated->update(request()->all());
        return to_route("posts.index");
    }
    function destroy($post){
        $deleted= Post::findOrFail($post);
        $deleted->delete();
        return to_route("posts.index");
    }


}
