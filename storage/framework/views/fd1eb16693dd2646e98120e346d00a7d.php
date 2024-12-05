
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Patients</h5>
                        
                    </div>
                            <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                            <?php endif; ?>

                            <?php if(session('fail')): ?>
                            <div class="alert alert-danger"><?php echo e(session('fail')); ?></div>
                            <?php endif; ?>

                            <?php if(session('completed')): ?>
                            <div class="alert alert-success mt-3"><?php echo e(session('completed')); ?></div>
                            <?php endif; ?>
                </div>
                
                <div class="store_list table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr> 
                            <td><?php echo e($data->serial_number); ?></td>
                            <td><?php echo e($data->name); ?></td>
                            <td><?php echo e($data->phone); ?></td>
                            <td>
                                <?php if($data->status == "completed"): ?>
                                   <button style="border:none; padding:0 5px; background:green; border-radius: 10px; color:#fff; font-size:10px"><?php echo e($data->status); ?></button> 
                                <?php else: ?>
                                    <button style="border:none; padding:0 5px; background:red; border-radius: 10px; color:#fff; font-size:10px"><?php echo e($data->status); ?></button> 
                                <?php endif; ?>
                                
                            </td>
                            
                            <td>   
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

<?php echo $__env->make('Backend.layouts.doctor.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/doctor/chamber/old_patients.blade.php ENDPATH**/ ?>