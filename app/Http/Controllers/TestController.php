<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    function testaction(){
        return "Called from test controller";
    }
    function getusers(){
        $users = [["id"=>1, "name"=>"Noha"], ["id"=>2, "name"=>"Mname"]];
        ### blade ---> send the variables
        return view("users",["users"=>$users]);
    }
}
