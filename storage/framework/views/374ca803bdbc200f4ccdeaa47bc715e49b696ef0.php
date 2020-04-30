<?php $__env->startSection('title','Danh mục tin tức'); ?>;
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="text-general clearfix">
            <div class="text-general-title pull-left">
                <h3>Danh mục tin tức</h3>
            </div>
            <div class="text-general-list pull-right">
                <ul>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh mục tin tức</li>
                </ul>
            </div>
        </div>

        <div class="list-option-data">
            <ul>
                <li>
                    <a href="<?php echo e(route('admin.get.create.CategoryNews')); ?>">
                        <i class="fa fa-plus"></i> Thêm mới
                    </a>
                </li>
            </ul>
        </div>
        <div class="list-data">

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>