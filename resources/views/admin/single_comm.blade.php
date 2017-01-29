@extends('layouts.app')
@section('title')
<?php echo $single_comm->id?>
@endsection
@section('content')
    <div class="container">
    <div class="row">
    <div class="col-lg-8">
        <h1><?php echo $single_comm->id ?></h1>
        <p class="lead">
             <a href="<?php echo $single_comm->post_id ?>">Visit Link</a>
        </p>
        <hr>
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo date("d M Y", strtotime( $single_comm->created_at )); ?> at <?php echo date("g:iA", strtotime($single_comm->created_at)); ?></p>
        <p class="lead"><?php echo $single_comm->content ?></p>
        <hr>
    <h2>Leave a comment</h2>
    </div>
    <div class="panel-body">
        <form method="post" action="{{URL('/post/comment/publish')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <textarea required="required" placeholder="Enter comment here" name = "content" class="form-control"></textarea>
            </div>
            <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
        </form>
    </div>
    </div>
    </div>
    </div>

@endsection

