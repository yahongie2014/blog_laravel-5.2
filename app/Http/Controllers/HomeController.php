<?php
/*
Ahmed Saeed Ahmed 
Senior PHP Developer
*/
namespace App\Http\Controllers;

use App\Http\Requests;
use Carbon\CarbonInterval;
use Request;
use App\Post;
use App\Like;
use App\Comment;
use App\User;
use Input;
use Response;
use Auth;
use DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;



class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $id = Request::segment(3);

    }

    public function index()
    {
        return view('home');
    }

	public function edit_posts($id){

        $Post = Post::find($id);
        $success = Input::get('success');
        if ($Post) {
            return view('admin.edit')
                ->with('success', $success)
                ->with('Post', $Post);
        } else {
            return View('admin.edit',['Post' => Post::find($id)])
                ->with('title', 'Error Page Not Found');
        }
    }

    public function update_post(){

        $poo = Post::find(Input::get('id'));
        $poo->title = input::get('title');
        $poo->slug = input::get('slug');
        $poo->user_id = Auth::user()->id;
        $poo->content = input::get('content');
        $poo->update();

        session()->flash('flash_message', 'Your idea has been Edit for Review');
        return Redirect::to("/Showarticle?success=$poo->id");
    }

    public function Del_posts($id) {

        $pos = Post::find($id);
        if ($pos) {
            Post::where('id', $id)->delete();
            return Redirect::to("/Showarticle?success=$pos->id");
        } else {
            return view('notfound')->with('title', 'Error Page Not Found')->with('page', 'Error Page Not Found');
        }

    }

    public function Show_post($id){

        $id = intval($id);

        $single_post = Post::find($id);

        $single_comment = Comment::select('*')
            ->leftjoin('users','comments.user_id','=','users.id')
            ->leftjoin('posts','posts.id','=','comments.post_id')
            ->select('comments.id as comments_id','comments.post_id as comments_post_id','posts.id as post_id','comments.created_at as comment_date','comments.content as comments_content','users.name as comments_user','users.id as user_id','comments.user_id as comments_user_id')
            ->where('comments.post_id',$single_post->id)
            ->paginate(10);

        $success = Input::get('success');
        if ($single_post ) {
            return view('admin.single_post')
                ->with('success', $success)
                ->with('single_comment', $single_comment)
                ->with('single_post', $single_post);
        } else {
            return View('admin.single_post',['single_post' => Post::find($id)])
                ->with('title', 'Error Page Not Found');
        }
    }

    public function Create_comment (){

    $comment = new Comment();
    $comment->id = input::get('id');
    $comment->user_id = Auth::user()->id;
    $comment->content = input::get('content');
    $comment->post_id = input::get('post_id');
    $comment->save();
    return Redirect()->back()->with("$comment->post_id", 'You have been successfully Add New One');
    }

    public function edit_comment($id){

        $comment_edit = Comment::find($id);
        $success = Input::get('success');
        if ($comment_edit) {
            return view('admin.edit_comment')
                ->with('success', $success)
                ->with('comment_edit', $comment_edit);
        } else {
            return Redirect()->back()
            ->route('admin.edit_comment',['comment_edit' => Comment::find($id)])
                ->with('title', 'Error Page Not Found');
        }
    }

    public function update_comment(){

        $comments = Comment::find(Input::get('id'));
        $comments->user_id = Auth::user()->id;
        $comments->content = input::get('content');
        $comments->update();

        session()->flash('flash_message', 'Your idea has been Edit for Review');
        return Redirect::to("/Showarticle?success=$comments->id");
    }

    public function Del_comment($id) {

        $success = Input::get('success');
        $comme_del = Comment::find($id);
        if ($comme_del) {
            Comment::where('id', $id)->delete();
            return Redirect::to("/Showarticle?success=$comme_del->id");
        } else {
            return view('notfound')->with('title', 'Error Page Not Found')->with('page', 'Error Page Not Found');
        }

    }

    public function post_up(Request $r)
    {
        $p_id = $r->input('post');
        $u_id = $r->input('user');
        $post_l = new Like;
        $post_l->post_id=$p_id;
        $post_l->user_id=$u_id;
        $post_l->up = 1;
        $post_l->save();
    }

}
