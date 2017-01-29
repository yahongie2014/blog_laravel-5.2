<?php $__env->startSection('title'); ?>
<?php echo $single_post->title?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
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
    <?php if(Auth::guest()): ?>
        <h1>Please Login</h1>
        <?php else: ?>
            <h1>Comments :</h1>
            <?php foreach($single_comment as $single): ?>
                <div class="media">
                        <div class="media-body">
                            <h3><?php echo $single->comments_content ?></h3>
                            <?php if($single->comments_user_id == Auth::user()->id): ?>
                                <h3>By: <?php echo $single->comments_user ?></h3>
                            <?php else: ?>
                                <h3>By: <?php echo $single->comments_user ?></h3>

                            <?php endif; ?>
                            <?php if($single->comments_user_id == Auth::user()->id): ?>
                                <h4 class="media-heading">
                                    posted in : <small><?php echo date("d M Y", strtotime( $single->comment_date )); ?>  at  <?php echo date("g:iA", strtotime($single->comment_date)); ?></small>
                                    <a href="<?php echo e(url('/post/comment/edit',$single->comments_id)); ?>" class="btn btn-primary btn-xs edit-btn">edit</a>
                                </h4>
                            <?php else: ?>
                                <h4 class="media-heading">
                                    posted in : <small><?php echo date("d M Y", strtotime( $single->comment_date )); ?>  at  <?php echo date("g:iA", strtotime($single->comment_date)); ?></small>
                                </h4>
                            <?php endif; ?>
                            <hr>
                        </div>
                    </div>
            <?php endforeach; ?>
            <div>
    <h2>Leave a comment</h2>
    </div>
    <div class="panel-body">
        <form method="post" action="<?php echo e(URL('/post/comment/publish')); ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="post_id" value="<?php echo $single_post->id ?>">
            <div class="form-group">
                <textarea required="required" placeholder="Enter comment here" name = "content" class="form-control"></textarea>
            </div>
            <input type="submit" name='post_comment' class="btn btn-success" value = "Post"/>
        </form>
    </div>
    <?php endif; ?>
    </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>