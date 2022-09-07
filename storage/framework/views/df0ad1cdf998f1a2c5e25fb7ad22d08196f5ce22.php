<form action="<?php echo e(url($delete_url)); ?>" method="post">
    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
    <?php if($edit_url && !$model->is_admin): ?>
        <a href="<?php echo e($edit_url); ?>" class="btn btn-sm btn-primary text-white">Edit</a>
    <?php endif; ?>
    <a href="<?php echo e($show_url); ?>" class="btn btn-sm btn-info">Detail</a>
    <?php if($delete_url && !$model->is_admin): ?>
    <button
    type="submit"
    class="btn btn-danger btn-sm"
    onclick="return confirm('Are you sure want to delete this data ?')"
    >Delete</button>
    <?php endif; ?>
</form><?php /**PATH C:\xampp\htdocs\attendance-api\resources\views/layouts/_action.blade.php ENDPATH**/ ?>