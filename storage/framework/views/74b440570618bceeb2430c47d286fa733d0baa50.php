<?php $__env->startSection('title'); ?>
Add New Article
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
             <div class="breadcrumb">
                <a href="<?php echo e(URL('/Showarticle')); ?>"><--- back to overview</a>
            </div>
            
            <div class="panel panel-default">
                <div class="panel-heading">Add article</div>
                <div class="panel-content">
                    <form action="<?php echo e(URL::Route('publish')); ?>" method="POST" class="form-horizontal">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group">
                            <label for="article-title" class="col-sm-3 control-label">Title (max. 255 characters)</label>
                            <div class="col-sm-6">
                                <input name="title" id="article-title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="article-title" class="col-sm-3 control-label">URL (max. 255 characters)</label>
                            <div class="col-sm-6">
                                <input name="slug" id="article-title" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="article-url" class="col-sm-3 control-label">Content (max. 255 characters)</label>

                            <div class="col-sm-6">
                                <textarea required="required" placeholder="Enter comment here" name = "content" class="form-control"></textarea>
                            </div>
                        </div>
                        <!-- Add Article Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-plus"></i> Add Article
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>