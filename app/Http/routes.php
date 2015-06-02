<?php

use Illuminate\Support\Str;

$router->bind('posts', function($slug){
    return App\Post::whereSlug($slug)->first();
});
$router->resource('posts', 'PostsController');

$router->bind('tags', function($name){
    return App\Tag::whereName($name)->first();
});
$router->resource('tags', 'TagsController');

$router->bind('comments', function($slug){
    return App\Comment::whereSlug($slug)->first();
});
$router->resource('comments', 'CommentsController');


$router->bind('user', function($slug){
    return App\User::whereSlug($slug)->first();
});
Route::get('user/{slug}/posts', 'UsersController@posts');
Route::get('user/{slug}/comments', 'UsersController@comments');

$router->resource('user', 'UsersController');

$router->bind('settings', function($id){
   return App\Settings::whereId($id)->first();
});
$router->resource('settings', 'SettingsController');

Route::get('home', 'PagesController@home');

Route::get('/', 'PagesController@home');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

//Ajax image handling
Route::post('saveimage', function(){
    $file = Request::file('file');
    $destinationPath = public_path().'/uploads/';
    $randomName = str_random(16).'.'.$file->getClientOriginalExtension();
    while(file_exists('/uploads/'.$randomName)){
        $randomName = str_random(16).$file->getClientOriginalExtension();
    }
    $file->move($destinationPath, $randomName);
    echo url().'/uploads/'.$randomName;
});
//Ajax Slug Generation
Route::post('/generateSlug', function(){
    if(Request::ajax()) {
        $title = Input::all()['title'];
        $slug = str_slug($title, '-');
        echo($slug);
    }
});

