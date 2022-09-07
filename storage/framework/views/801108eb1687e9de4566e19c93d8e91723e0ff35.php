<?php $__env->startSection('title', 'User'); ?>

<?php $__env->startPush('style'); ?>
    <!-- CSS Libraries -->
    

    <link rel="stylesheet"
        href="<?php echo e(asset('library/datatables/media/css/jquery.dataTables.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('main'); ?>
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Absensi</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User</th>
                                                <th>Status</th>
                                                <th>Check In Time</th>
                                                <th>Check Out Time</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <!-- JS Libraies -->
    
    <script src="<?php echo e(asset('library/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    
    
    <script src="<?php echo e(asset('library/jquery-ui-dist/jquery-ui.min.js')); ?>"></script>

    <!-- Page Specific JS File -->
    <script src="<?php echo e(asset('js/page/modules-datatables.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: '<?php echo e(url("absensi")); ?>',
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'user.name', name: 'user.name'},
                    {data: function(row) {
                        return row.status ? "Check Out" : "Check In"
                    }, name: 'status'},
                    {data: function(row) {
                        let date = new Date(row.created_at);
                        return date.toLocaleString();
                    }, name: 'created_at'},
                    {data: function(row) {
                        let date = new Date(row.updated_at);
                        return date.toLocaleString();
                    }, name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance-api\resources\views/pages/attendance/index.blade.php ENDPATH**/ ?>