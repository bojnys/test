<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Tag;
use App\Post;

class TagsController extends Controller {
    private $tag;
    public function __construct(Tag $tag){
        $this->tag = $tag->orderBy('name', 'asc');
    }
    public function index(){
        $tags = $this->tag->get();
        return view('tags.index', compact('tags'));
    }
    public function show(Tag $tag){
        if(isset($tag->name)){
            $settings = DB::table('settings')->first();
            $posts = $tag->posts()->orderBy('slug')->paginate(5);
            foreach ($posts as $post){
                $post->shortContent = Str::words($post->content, $settings->publicPostLength, '...');
            }
            return view('tags.show', compact('posts','tag'));
        }
        else{
            abort(404);
        }
    }
}