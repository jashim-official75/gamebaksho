

<?php $__env->startSection('pageName'); ?>
    Support
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Support List</h4>
                    <h5 class="card-subtitle">Total support requests <b><?php echo e($supports->total()); ?></b></h5>

                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Reason</th>
                                    <th>S_Numb</th>
                                    <th>S_Numb</th>
                                    <th>Message</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="">

                                        <td><?php echo e($loop->index + 1); ?>

                                        </td>
                                        <td><?php echo e($support->name); ?></td>
                                        <td><a href="mailto:<?php echo e($support->email); ?>"><?php echo e($support->email); ?></a></td>
                                        <td><?php echo e($support->phone_number); ?></td>
                                        <td>
                                            <?php if($support->reason == 1): ?>
                                            Login Problem
                                            <?php elseif($support->reason == 2): ?>
                                            Subscription Problem
                                            <?php else: ?>
                                            Others Problem 
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($support->regis_number); ?></td>
                                        <td><?php echo e($support->subscrb_number); ?></td>
                                        <td><?php echo e(Str::limit($support->message, 40)); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin.newsupport.delete', $support->id)); ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                            <tfoot>
                                <tr>

                                    <td colspan="5">
                                        <div class="text-right d-flex justify-content-end">
                                            <?php echo e($supports->links()); ?>

                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/pages/support/frontend_support.blade.php ENDPATH**/ ?>