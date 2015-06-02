<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\User;

class UsersController extends Controller {
    private $user;

    public function __construct(User $user){
        $this->user = $user->orderBy('id', 'asc');
    }

    public function index(){
        $user = $this->user->get();
    }

    public function show(User $user){
        if(isset($user->slug)){
            $settings = DB::table('settings')->first();
            $comments = $user->comments()->orderBy('id', 'DESC')->take($settings->defaultCommentsProfile)->get();
            $posts = $user->posts()->orderBy('id', 'DESC')->take($settings->defaultPostsProfile)->get();
            return view('users.show', compact('user','comments','posts','settings'));
        }
        else{
            abort(404);
        }
    }
    public function posts($slug){
        $user = User::whereSlug($slug)->first();
        if(isset($user->slug)){
            $settings = DB::table('settings')->first();
            $comments = $user->comments()->orderBy('id', 'DESC')->take($settings->defaultCommentsProfile)->get();
            $posts = $user->posts()->orderBy('id', 'DESC')->paginate($settings->profilePPP);
            return view('users.posts', compact('user','comments','posts','settings'));
        }
        else{
            abort(404);
        }
    }
    public function comments($slug){
        $user = User::whereSlug($slug)->first();
        if(isset($user->slug)){
            $settings = DB::table('settings')->first();
            $comments = $user->comments()->orderBy('id', 'DESC')->paginate($settings->profileCPP);
            $posts = $user->posts()->orderBy('id', 'DESC')->take($settings->defaultPostsProfile)->get();
            return view('users.comments', compact('user','comments','posts','settings'));
        }
        else{
            abort(404);
        }
    }
    public function edit(User $user){
        dd($user);
    }
}