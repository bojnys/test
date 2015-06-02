<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function index(){
        $lessons = ['My first Lesson', 'My second lesson', 'My third lesson'];
        $name = 'John Doe';
        return view('pages.home', compact('lessons', 'name'));
    }
    public function about(){
        return view('pages.about');
    }
    public function home(){
        return view('home');
    }
    public function welcome(){
        return view('welcome');
    }

}
