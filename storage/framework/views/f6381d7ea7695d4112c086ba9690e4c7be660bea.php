

<?php $__env->startSection('pageName'); ?>
    Traffic
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a class=" btn btn-primary text-light">Total Traffic : <?php echo e($TotalTraffic); ?></a>
                        <a class=" btn btn-info text-light">Today Traffic : <?php echo e($TodayTraffic); ?></a>
                        <a class=" btn btn-success text-dark">Previous Day Traffic : <?php echo e($previousTraffic); ?></a>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Ip</th>
                                    <th>Device</th>
                                    <th>Source</th>
                                    <th>count_trafic</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $traffics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $traffic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($traffics->currentpage() - 1) * $traffics->perpage() + $loop->index + 1); ?></td>
                                        <td><?php echo e($traffic->ip); ?></td>
                                        <td><?php echo e($traffic->is_device); ?></td>
                                        <td><?php echo e($traffic->source); ?></td>
                                        <td><?php echo e($traffic->count_trafic); ?></td>
                                        <td><?php echo e($traffic->created_at->diffForHumans()); ?></td>
                                        
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                            
                        </table>
                        <?php echo e($traffics->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/pages/traffic/other.blade.php ENDPATH**/ ?>