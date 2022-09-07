<?php $__env->startSection('main'); ?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Absensi</h1>
        </div>
        <div class="section-body">
            <div class="card">
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
                                <td><?php echo e($attendance->user->name); ?></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><?php echo e($attendance->status ? 'Check Out' : 'Check In'); ?></td>
                            </tr>
                            <tr>
                                <th>Check In</th>
                                <td><?php echo e($attendance->created_at); ?></td>
                            </tr>
                            <tr>
                                <th>Check Out</th>
                                <td><?php echo e($attendance->updated_at); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <?php $__currentLoopData = $attendance->detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-user-check mr-1"></i>
                        Attendance <?php echo e($detail->type); ?>

                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table-striped table" id="datatable">
                        <tbody>
                            <tr>
                                <th>Time</th>
                                <td><?php echo e($detail->created_at); ?></td>
                            </tr>
                            <tr>
                                <th>Lat, Long</th>
                                <td><?php echo e($detail->lat); ?>, <?php echo e($detail->long); ?></td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td><?php echo e($detail->address); ?></td>
                            </tr>
                            <tr>
                                <th>Location</th>
                                <td>
                                    <div style="width: 100%">
                                        <iframe width="100%" height="300" frameborder="0" scrolling="no"
                                            marginheight="0" marginwidth="0"
                                            src="https://maps.google.com/maps?q=<?php echo e($detail->lat); ?>,<?php echo e($detail->long); ?>&hl=en&z=14&amp;output=embed">
                                        </iframe>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><img width="350" src="<?php echo e(asset('/storage/attendance/' . $detail->photo)); ?>" alt=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance-api\resources\views/pages/attendance/show.blade.php ENDPATH**/ ?>