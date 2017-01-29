<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $article = App\Post::select('*')
        ->leftjoin('users','posts.user_id','=','users.id')
        ->select('posts.id as post_id','posts.title as post_title','posts.content as post_content','posts.slug as post_slug','users.name as post_user','posts.user_id as post_user_id')
        ->orderBy('posts.id', 'DESC')
        ->paginate(10);
    return view('welcome')->with('article',$article);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();
    Route::get('/home', 'HomeController@index');
    //Article
    Route::get('/article', function () {
    return view('admin.create');});
    Route::get('/post/edit', function () {
        return view('admin.edit');});
    Route::get('/Showarticle',function(){
        return view('admin.show');
    });
    Route::get('/post/comment', function () {
        return view('admin.single_post');});


    Route::post('/publish', array('as' => 'publish', 'uses' => 'Admin@Create_post'));
    Route::get('/post/edit/{id}', array('as' => 'post_edit', 'uses' => 'HomeController@edit_posts'));
    Route::post('/post/update', array('as' => 'post_update', 'uses' => 'HomeController@update_post'));
    Route::get('/post/del/{id}', array('as' => 'post_delete', 'uses' => 'HomeController@Del_posts'));
    Route::get('/comment/del/{id}', array('as' => 'comment_delete', 'uses' => 'HomeController@Del_comment'));
    Route::get('/post/comment/{id}', array('as' => 'Show_posts', 'uses' => 'HomeController@Show_post'));
    Route::get('/post/lol/{id}', array('as' => 'Show_comm', 'uses' => 'HomeController@Show_comm'));
    Route::get('/post/comment/edit/{id}', array('as' => 'comment_edit', 'uses' => 'HomeController@edit_comment'));
    Route::post('/post/comment/update', array('as' => 'comment_update', 'uses' => 'HomeController@update_comment'));
    Route::post('/post/comment/publish', array('as' => 'comment_publish', 'uses' => 'HomeController@Create_comment'));
    Route::get('/Vote/Up/{id}/{user}/{location}', array('as' => 'vote_up', 'uses' => 'HomeController@up'));
    Route::get('/Vote/Down/{id}/{user}/{location}', array('as' => 'vote_down', 'uses' => 'HomeController@down'));




});



