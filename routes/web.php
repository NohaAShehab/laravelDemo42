<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OldPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EmailController;
use App\Models\User;

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
//Route::get('/posts',[OldPostController::class,"index"])->name("posts.index");
//Route::get('/posts/create',[OldPostController::class,"create"])->name("posts.create");
//Route::post('/posts',[OldPostController::class,"store"])->name("posts.store")->middleware("auth");
//
//Route::get('/posts/{post}',[OldPostController::class,"show"])->name("posts.show")->middleware("isadmin");
//Route::get("/posts/{post}/edit",[OldPostController::class,"edit"])->name("posts.edit");
//
//### update
//
//Route::put("/post/{post}",[OldPostController::class,"update"])->name("posts.update");
//#delete
//
//Route::delete("/post/{post}",[OldPostController::class,"destroy"])->name("posts.destroy");


Route::resource("posts",PostController::class);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('email', [EmailController::class,'sendEmail']);

/*
 *  lines related to connection
 *
 *
 * *************/
use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    # this will redirect me to github
    return Socialite::driver('github')->redirect();
})->name("loginwithgithub");

Route::get('/auth/callback', function () {
//    dd("we are in auth call back route");
    $user = Socialite::driver('github')->user();
    // $user->token
    ### get token from github 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
    ### that can be used in next application
//    @dd($user);

    ## till now the user is not authenticated
//    @dd($user->email, $user->getNickname());
    $githubUser = Socialite::driver('github')->user();
//    dd($githubUser);
    $user = User::where('email', $githubUser->email)->first();

    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name ? $githubUser->name : $githubUser->nickname,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
            'password'=>$githubUser->email
        ]);
    }

    Auth::login($user);

    return redirect('/home');
});

Route::get("get-all-github-issues",function (){
   ### some logic to ask github for info using this token
});
