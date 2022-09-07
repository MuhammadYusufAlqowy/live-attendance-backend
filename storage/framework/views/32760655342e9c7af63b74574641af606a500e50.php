<?php if (! ($breadcrumbs->isEmpty())): ?>
    <div class="section-header-breadcrumb">
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $breadcrumb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(!is_null($breadcrumb->url) && !$loop->last): ?>
                <div class="breadcrumb-item"><a href="<?php echo e($breadcrumb->url); ?>"><?php echo e($breadcrumb->title); ?></a></div>
            <?php else: ?>
                <div class="breadcrumb-item active"><?php echo e($breadcrumb->title); ?></div>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\attendance-api\resources\views/components/breadcrumbs.blade.php ENDPATH**/ ?>