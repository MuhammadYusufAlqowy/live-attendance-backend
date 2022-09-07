<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <?php echo e(Breadcrumbs::render()); ?>

        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Detail User</h4>
                </div>
                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <table class="table-striped table" id="datatable">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td><?php echo e($user->name); ?></td>
                            </tr>
                            <tr>
                                <th>E-Mail</th>
                                <td><?php echo e($user->email); ?></td>
                            </tr>
                            <tr>
                                <th>Is Admin?</th>
                                <td><?php echo e($user->is_admin ? 'Yes' : 'No'); ?></td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <?php if(!empty($user->photo)): ?>
                                    <td class="p-5"><img width="350" src="<?php echo e(asset('/storage/profile/' .$user->photo)); ?>" alt=""></td>
                                <?php else: ?>
                                    <td class="p-5"><img width="350" src="<?php echo e(asset('img\avatar\avatar-1.png')); ?>" alt=""></td>
                                <?php endif; ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance-api\resources\views/pages/user/show.blade.php ENDPATH**/ ?>