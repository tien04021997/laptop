<?php $__env->startSection('title','Thay đổi thông tin danh mục sản phẩm'); ?>;
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="text-general clearfix">
            <div class="text-general-title pull-left">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <div class="text-general-list pull-right">
                <ul>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Danh sách</a></li>
                    <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                </ul>
            </div>
        </div>

        <div class="form-add">
            <?php if($message = Session::get('success-update')): ?>

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong><?php echo e($message); ?></strong>

                </div>
            <?php endif; ?>
            <?php echo $__env->make('admin::CategoryProduct.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 500);
</script>
<?php echo $__env->make('admin::layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>