@extends('layouts.app')
@section('title')
Edit your Comment
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="breadcrumb">
                <a href="{{URL('/Showarticle')}}"><--- back to overview</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                <a href="{{url('comment/del',$comment_edit->id)}}" class="btn btn-danger btn-xs pull-right">
                    <i class="fa fa-btn fa-trash" title="delete"></i> delete Comment
                </a>

                <div class="panel-content">
                    <form  id="main-form" method="post" action="{{URL::Route('comment_update')}}" class="form-horizontal form-bordered" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="post_id" value="<?php echo $comment_edit->post_id ?>">
                        <input type="hidden" name="id" value="<?php echo $comment_edit->id ?>">
                        <div class="form-group">
                            <label for="article-url" class="col-sm-3 control-label">Content (max. 255 characters)</label>
                            <div class="col-sm-6">
                                <textarea required="required" placeholder="<?php echo $comment_edit->content ?>" name = "content" class="form-control"><?php echo $comment_edit->content ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Edit Comment
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@stop