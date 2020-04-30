
<form action="javascript:void(0)" method="POST" id="myDiv" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="alert alert-success d-none" id="msg_div">
        <span id="res_message"></span>
    </div>
    <div class="row">
        <div class="col-12 col-md-9">
            <div class="form-left">
                <div class="frm-item">
                    <div class="frm-title">
                        <i class="fas fa-file"></i> Tên và mô tả danh mục
                    </div>
                    <div class="form-group">
                        <label for="name">Tên danh mục:</label>
                        <input type="text" class="form-control" name="name" value="">
                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                        
                            
                                
                            
                        
                    </div>

                    <div class="form-group">
                        <label for="name">Icon:</label>
                        <input type="text" class="form-control" name="icon" value="">
                        <?php if($errors->has('icon')): ?>
                            <span class="error-text">
                                <?php echo e($errors->first('icon')); ?>

                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="name">Title Seo:</label>
                        <input type="text" class="form-control" name="title_seo" value="">
                    </div>

                    <div class="form-group">
                        <label for="name">Description Seo:</label>
                        <input type="text" class="form-control" name="description_seo" value="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="form-right">
                <div class="frm-item">
                    <div class="frm-title">
                        <i class="far fa-image"></i> Ảnh đại diện
                    </div>

                    
                        
                        
                    
                </div>

                <div class="frm-item">
                    <div class="frm-title">
                        <i class="fas fa-cloud-upload-alt"></i> Đăng bài
                    </div>

                    <div class="list-button">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" id="send_form" class="btn btn-success btnSubmit">
                                    <i class="fa fa-check"></i> Cập nhật
                                </button>
                            </div>
                            <div class="col-6">
                                <button type="" class="btn btn-success btnSync">
                                    <i class="fas fa-sync-alt"></i> Nhập lại
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function(){
        $('#send_form').click(function(e){
            e.preventDefault();
            /*Ajax Request Header setup*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#send_form').html('Sending..');

            /* Submit form data using ajax*/
            $.ajax({
                url: "<?php echo e(url('/create')); ?>",
                method: 'post',
                data: $('#myDiv').serialize(),
                success: function(response){
                    //------------------------
                    $('#send_form').html('Submit');
                    $('#res_message').show();
                    $('#res_message').html(response.msg);
                    $('#msg_div').removeClass('d-none');

                    document.getElementById("myDiv").reset();
                    setTimeout(function(){
                        $('#res_message').hide();
                        $('#msg_div').hide();
                    },10000);
                    //--------------------------
                }});
        });
    });
</script>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
