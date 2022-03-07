<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/test", function (){
    return "Hi Nohaaa";
});

//Route::get('/users',function (){
//    return view("users");
//});
//
//Route::view("/usersview","users");


#### it is not recommeded to put the login in the web.php
//Route::get('/users',function (){
//    $users = [["id"=>1, "name"=>"Noha"], ["id"=>2, "name"=>"Mname"]];
//    ### blade ---> send the variables
//    return view("users",["users"=>$users]);
//});

############################


Route::get('/test',[TestController::class,"testaction" ]);

Route::get('/users',[TestController::class,"getusers"]);

##############
//https://laravel.com/docs/9.x/controllers#resource-controllers
Route::get('/posts',[PostController::class,"index"])->name("posts.index");
Route::get('/posts/create',[PostController::class,"create"])->name("posts.create");
Route::post('/posts',[PostController::class,"store"])->name("posts.store")->middleware("auth");

Route::get('/posts/{post}',[PostController::class,"show"])->name("posts.show")->middleware("isadmin");
Route::get("/posts/{post}/edit",[PostController::class,"edit"])->name("posts.edit");

### update

Route::put("/post/{post}",[PostController::class,"update"])->name("posts.update");
#delete

Route::delete("/post/{post}",[PostController::class,"destroy"])->name("posts.destroy");






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
