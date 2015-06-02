<?php namespace App\Http\Controllers;
use Auth;
use App\Http\Requests\CreateCommentRequest;
use App\Post;
use DB;
use App\Comment;
class SettingsController extends Controller {
    public function index(){
        $settings = DB::table('settings')->first();
        return view('settings.index', compact('settings'));
    }
    public function update(){

    }
    public function show(){
        $settings = DB::table('settings')->first();
        return view('settings.edit', compact('settings'));
    }
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */


}
