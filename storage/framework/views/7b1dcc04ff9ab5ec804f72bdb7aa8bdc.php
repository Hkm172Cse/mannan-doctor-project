
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Chamber list</h5>
                    </div>
                </div>
                
                <div class="store_list table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Start time</th>
                            <th>End time</th>
                            <th>Active days</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr> 
                            <td><?php echo e(++$key); ?></td>
                            <td><?php echo e($data->name); ?></td>
                            <td><?php echo e($data->address); ?></td>
                            <td><?php echo e($data->start_time); ?></td>
                            <td><?php echo e($data->end_time); ?></td>
                            <td><?php echo e($data->active_days); ?></td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="text-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="<?php echo e(route('doctor.chamber.edit', $data->id)); ?>" class="dropdown-item text-primary">
                                                <i class="ph-pen me-2"></i>
                                                Edit
                                            </a>
                                            
                                            <button type="button" 
                                                data-url="/admin/store/delete/<?php echo e($data->id); ?>" 
                                                data-header="<?php echo e($data->id); ?>"
                                                data-body="<?php echo e($data->id); ?>"
                                            class="dropdown-item text-danger delete_modal ">
                                                <i class="ph-trash me-2"></i>
                                                Delete
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>


                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('js'); ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('ul.pagination li a').on('click', function(e) {
                e.preventDefault();
                openLink($(this).attr('href'));
            })
        });

        function openLink(link) {
            $.ajax({
                url: link,
                type: 'GET',
            }).done(function(res) {
                console.log(res);
                $('.store_list').html(res);
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Mannan_vai_project\resources\views/Backend/doctor/chamber/list.blade.php ENDPATH**/ ?>