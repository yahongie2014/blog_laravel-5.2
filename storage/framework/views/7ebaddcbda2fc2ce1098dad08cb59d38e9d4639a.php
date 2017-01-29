<?php $__env->startSection('title'); ?>
    All Article
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Article overview</div>

                    <div class="panel-content">

                        <ul class="article-overview">
                            <?php foreach($article as $artic): ?>
                                <li>
                                    <div class="vote">
                                        <div class="form-inline upvote">
                                            <i class="fa fa-btn fa-caret-up disabled upvote" title="<?php echo $artic->post_title ?>"></i>
                                        </div>
                                        <div class="form-inline upvote">
                                            <i class="fa fa-btn fa-caret-down disabled downvote" title="You need to be logged in to downvote"></i>
                                        </div>
                                    </div>
                                    <div class="container-fluid">
                                        <a target="_blank" href="<?php echo $artic->slug ?>" class="urlTitle"><?php echo  $artic->post_title?> </a>
                                        <p class="col-lg-6 col-lg-6"><?php echo  $artic->post_content?> </p>
                                    </div>
                                    <div class="info">
                                        <?php echo $artic->post_title ?> | post by <?php echo  $artic->post_user ?> | <a href="<?php echo e(url('/post/comment',$artic->post_id)); ?>">Comment</a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>