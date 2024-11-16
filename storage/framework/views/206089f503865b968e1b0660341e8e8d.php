
<?php $__env->startPush('css'); ?>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Doctors specialists</h5>
                </div>
            </div>
            <div class="row mx-3 my-3">
                <a href="<?php echo e(route('admin.add.spacial')); ?>"><button class="btn btn-primary">Add</button></a>
                
            </div>
            <div class="store_list table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Specialist</th>
                            <th>Bangla title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $specialists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spacial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($key); ?></td>
                                                    <td><?php echo e($spacial->title); ?></td>
                                                    <td><?php echo e($spacial->bangla_title); ?></td>
                                                    <td>
                                                        <a href="<?php echo e(route('admin.edit.spacialist', $spacial->id)); ?>">Edit</a>
                                                        
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
        $(document).ready(function () {
            $('ul.pagination li a').on('click', function (e) {
                e.preventDefault();
                openLink($(this).attr('href'));
            })
        });

        // $('#product_search').on('input', function() {
        //     var search = $('#product_search').val();
        //     console.log({
        //         search
        //     })
        //     if (search.length > 2) {
        //         var url = '/store/search/' + search;
        //         openLink(url)
        //     }
        // });

        function openLink(link) {
            $.ajax({
                url: link,
                type: 'GET',
            }).done(function (res) {
                console.log(res);
                $('.store_list').html(res);
            });
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Backend.layouts.admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Me\Doctor_Admin\resources\views/Backend/specialist/list.blade.php ENDPATH**/ ?>