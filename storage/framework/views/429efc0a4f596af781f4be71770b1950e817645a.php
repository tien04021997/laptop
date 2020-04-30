<?php $__env->startSection('title','Thêm mới danh mục tin tức'); ?>;
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="text-general clearfix">
            <div class="text-general-title pull-left">
                <h3>Danh mục tin tức</h3>
            </div>
            <div class="text-general-list pull-right">
                <ul>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.get.create.CategoryNews')); ?>">Danh sách</a></li>
                    <li class="breadcrumb-item active">Danh mục tin tức</li>
                </ul>
            </div>
        </div>

        <div class="form-add">
            <?php echo $__env->make('admin::CategoryNews.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>