<?php namespace App\Http\Controllers;
use Auth;
use App\Http\Requests\CreateCommentRequest;
use App\Post;
use DB;
use App\Comment;
class CommentsController extends Controller {

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
    private $comment;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Comment $comment){
        $this->comment = $comment->orderBy('id', 'desc');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index(){
    }

    public function store(CreateCommentRequest $request){
        if(!Auth::user()){
            return redirect('posts/');
        }

        $slug = $request->slug;
        $request['slug'] = str_random(16);

        while(DB::table('comments')->where('slug','=',$request['slug'])->count()>0){
            $request['slug'] = str_random(16);
        }

        $request['user_id'] = Auth::user()->id;
        $comment = new Comment($request->all());
        $post = Post::where('slug','=',$slug)->first();
        $post->comments()->save($comment);

        flash()->success('Comment succesvol toegevoegd.');
        return redirect('posts/'.$slug);
    }

    public function destroy(Comment $comment){
        $post = Post::where('id', '=', $comment->post_id)->first();
        $comment->delete();

        flash()->success('Comment succesvol verwijderd.');

        return redirect('posts/'.$post->slug);
    }
}
