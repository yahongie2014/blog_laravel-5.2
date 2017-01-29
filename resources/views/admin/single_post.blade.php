@extends('layouts.app')
@section('title')
<?php echo $single_post->title?>
@endsection
@section('content')
    <div class="container">
    <div class="row">
    <div class="col-lg-8">
        <h1><?php echo $single_post->title ?></h1>
        <p class="lead">
             <a href="<?php echo $single_post->slug ?>">Visit Link</a>
        </p>
        <hr>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo date("d M Y", strtotime( $single_post->created_at )); ?> at <?php echo date("g:iA", strtotime($single_post->created_at)); ?></p>
        <p class="lead"><?php echo $single_post->content ?></p>
        <hr>
    @if (Auth::guest())
        <h1>Please Login</h1>
        @else
            <h1>Comments :</h1>
            @foreach($single_comment as $single)
                <div class="media">
                        <div class="media-body">
                            <h3><?php echo $single->comments_content ?></h3>
                            @if ($single->comments_user_id == Auth::user()->id)
                                <h3>By: <?php echo $single->comments_user ?></h3>
                            @else
                                <h3>By: <?php echo $single->comments_user ?></h3>

                            @endif
                            @if ($single->comments_user_id == Auth::user()->id)
                                <h4 class="media-heading">
                                    posted in : <small><?php echo date("d M Y", strtotime( $single->comment_date )); ?>  at  <?php echo date("g:iA", strtotime($single->comment_date)); ?></small>
                                    <a href="{{url('/post/comment/edit',$single->comments_id)}}" class="btn btn-primary btn-xs edit-btn">edit</a>
                                </h4>
                            @else
                                <h4 class="media-heading">
                                    posted in : <small><?php echo date("d M Y", strtotime( $single->comment_date )); ?>  at  <?php echo date("g:iA", strtotime($single->comment_date)); ?></small>
                                </h4>
                            @endif
                            <hr>
                        </div>
                    </div>
            @endforeach
            <div>
    <h2>Leave a comment</h2>
    </div>
    <div class="panel-body">
        <form method="post" action="{{URL('/post/comment/publish')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="post_id" value="<?php echo $single_post->id ?>">
            <div class="form-group">
                <textarea required="required" placeholder="Enter comment here" name = "content" class="form-control"></textarea>
            </div>
            <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
        </form>
    </div>
    @endif
    </div>
    </div>
    </div>

@endsection

