<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Data User</h1>
            <?php echo e(Breadcrumbs::render()); ?>

        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('user.update', $user->id)); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $user->name)); ?>">
                        </div>
                        <div class="form-group">
                            <label for="">e-Mail</label>
                            <input type="email" name="email" class="form-control" disabled readonly value="<?php echo e(old('email', $user->email)); ?>">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="image_profile" class="form-control-file" accept="image/*">
                            <?php if($user->photo): ?>
                            <img src="<?php echo e(asset('/storage/profile/' . $user->photo)); ?>" alt="" class="mt-2" height="150">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('library/upload-preview/upload-preview.js')); ?>"></script>
<script>
    var fileName = <?php echo json_encode($user->photo, 15, 512) ?>;
    var pathPhoto = "<?php echo e(asset('/storage/profile/')); ?>/"+fileName;
    var defaultPhoto = "<?php echo e(asset('img/avatar/avatar-1.png')); ?>";
    if(fileName){
        $("#image-preview").css(
        "background-image",
        "url(" + photo + ")"
        );
        $("#image-preview").css(
        "background-size",
        "cover"
        );
        $("#image-preview").css(
        "background-position",
        "center center"
        );
        $(".image-label").html("Change File");
    }else{
        $("#image-preview").css(
        "background-image",
        "url(" + defaultPhoto + ")"
        );
        $("#image-preview").css(
        "background-size",
        "cover"
        );
        $("#image-preview").css(
        "background-position",
        "center center"
        );
        $(".image-label").html("Upload File");
    }
        
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance-api\resources\views/pages/user/edit.blade.php ENDPATH**/ ?>