<?php $__env->startSection('title','Danh mục sản phẩm'); ?>;
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="text-general clearfix">
            <div class="text-general-title pull-left">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <div class="text-general-list pull-right">
                <ul>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.home')); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh mục sản phẩm</li>
                </ul>
            </div>
        </div>

        <div class="list-option-data">
            <ul>
                <li>
                    <a href="<?php echo e(route('admin.get.create.CategoryProduct')); ?>">
                        <i class="fa fa-plus"></i> Thêm mới
                    </a>
                </li>
            </ul>
        </div>

        <?php if($message = Session::get('notification-delete')): ?>
            <div id="flash-timeout" class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo e($message); ?></strong>
            </div>
        <?php endif; ?>

        <div class="form-search clearfix">
            <form class="form-inline" action="">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="<?php echo e(\Request::get('name')); ?>">
                </div>
                <button type="submit" class="btn btn-danger btn-default"><i class="fa fa-search"></i></button>
            </form>
        </div>

        <div class="list-data">
            <div class="list-data-table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th>Avatar</th>
                            <th>Nổi bật</th>
                            <th>Trạng thái</th>
                            <th width="10%">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($categoryProduct)): ?>
                        <?php $i = 1 ?>
                        <?php $__currentLoopData = $categoryProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e(($i)); ?></td>
                                <td><?php echo e($value->name); ?></td>
                                <td><img src="<?php echo e(isset($value->avatar) ? asset($value->avatar) : ''); ?>" style="width: 60px; height: 60px; object-fit: cover;"/></td>
                                <td>
                                    <a href="<?php echo e(route('admin.get.action.CategoryProduct',['status', $value->id])); ?>" class="badge <?php echo e($value->getHot($value->status)['class']); ?>">
                                        <?php echo e($value->getHot($value->status)['name']); ?>

                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('admin.get.action.CategoryProduct', ['active', $value->id])); ?>" class="badge <?php echo e($value->getActive($value->active)['class']); ?>">
                                        <?php echo e($value->getActive($value->active)['name']); ?>

                                    </a>
                                </td>
                                <td>
                                    <p>
                                        <a href="<?php echo e(route('admin.get.update.CategoryProduct', $value->id)); ?>" title="Sửa">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </p>
                                    <p>
                                        <a href="<?php echo e(route('admin.get.delete.CategoryProduct', $value->id)); ?>" title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </p>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="pagination-page">
                <?php echo e($categoryProduct -> links()); ?>

            </div>
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