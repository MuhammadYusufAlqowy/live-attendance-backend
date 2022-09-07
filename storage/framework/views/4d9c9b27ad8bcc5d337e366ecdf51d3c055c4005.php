

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
                <h1>Data User</h1>
                <?php echo e(Breadcrumbs::render()); ?>

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
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>E-Mail</th>
                                                <th>Role</th>
                                                <th>Action</th>
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
            var t= $('#datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        responsive: true,
                        ajax: '<?php echo e(url("user")); ?>',
                        columns: [
                            {data: 'DT_RowIndex', name: 'id'},
                            {data: 'name', name: 'name'},
                            {data: 'email', name: 'email'},
                            {data: 'role', name: 'role', orderable: false, searchable: false},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });
                    // t.on( 'draw.dt', function () {
                    // var PageInfo = $('#datatable').DataTable().page.info();
                    //     t.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                    //         cell.innerHTML = i + 1 + PageInfo.start;
                    //     } );
                    // } );    
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\attendance-api\resources\views/pages/user/index.blade.php ENDPATH**/ ?>