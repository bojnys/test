<?php namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use App\Tag;
use Jenssegers\Date\Date;
use DB;
class PostsController extends Controller {

    private $post;

    public function __construct(Post $post){
        $this->post = $post->orderBy('id', 'desc');
    }

    public function index(){
        $settings = DB::table('settings')->first();

        $posts = $this->post->paginate($settings->publicPPP);
        $tags = '';
        $aantalTags = DB::table('tags')->count();
        if($aantalTags >0){
            $tags = DB::table('tags')->get();
        }
        foreach ($posts as $post){
            //$strippedContent = strip_tags($post->lyrics, '<br><br/><span>');
            $post->shortContent = Str::words($post->content, $settings->publicPostLength, '...');
        }
        return view('posts.index', compact('posts','tags','aantalTags'));
    }

    public function show(Post $post){
        $settings = DB::table('settings')->first();
        $post['timeAgo'] = Date::parse($post->created_at)->diffForHumans();
        $comments = DB::table('comments')->where('post_id', '=', $post->id)->orderBy('id', 'DESC')->paginate($settings->publicCPP);
        if(isset($post->slug)){
            return view('posts.show', compact('post','comments'));
        }
        else{
            abort(404);
        }
    }

    public function create(){
        if(Auth::guest() || Auth::user()->role==1){
            return redirect('posts');
        }
        $tags = Tag::lists('name', 'id');
        return view('posts.create', compact('tags'));
    }

    public function store(CreatePostRequest $request){
        if(Auth::guest() || Auth::user()->role==1){
            return redirect('posts');
        }

        $this->createPost($request);

        flash()->success('The post has been added.');
        return redirect()->route('posts.index');
    }

    public function edit(Post $post){

        if(Auth::guest() || Auth::user()->role==1 || Auth::user()->id != $post->user->id){
            return redirect('posts');
        }
        $tags = Tag::lists('name','id');
        return view('posts.edit', compact('post', 'tags'));
    }
    public function update(Post $post, UpdatePostRequest $request){
        if(Auth::guest() || Auth::user()->role==1){
            return redirect('posts');
        }
        $post->fill($request->all())->save();
        $tags = $request->input('tag_list');
        if(!is_array($tags)){$tags =[];}
        $this->syncTags($post, $tags);

        flash('The post has been succesfully updated');

        return redirect('posts/'.$post->slug);
    }
    private function syncTags(Post $post, array $tags){
        $currentTags = array_filter($tags, 'is_numeric');
        $newTags = array_diff($tags, $currentTags);
        foreach($newTags as $newTag){
            //checkBestaan
            $count = Tag::where('name', '=', $newTag)->count();
            if($count > 0){
                dd($count);
            }
            if($count == 0){
                if($tag = Tag::create(['name' => $newTag])){
                    $currentTags[] = (string)$tag->id;
                }
            }else{
                $tagId = Tag::where('name', '=', $newTag)->get('id');
                $currentTags[] = (string)$tagId;
            }
        }
        $currentTags = array_unique($currentTags);
        $post->tags()->sync($currentTags);
    }

    private function createPost(CreatePostRequest $request){
        $post = Auth::user()->posts()->create($request->all());
        $tags = $request->input('tag_list');
        if(!is_array($tags)){ $tags = []; }
        $this->syncTags($post, $tags);
        return $post;
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('posts');
    }
}
