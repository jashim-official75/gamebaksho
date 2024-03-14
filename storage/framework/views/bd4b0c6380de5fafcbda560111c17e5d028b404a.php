

<?php $__env->startSection('pageName'); ?>
    Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a class=" btn btn-info text-light btn-sm">Today : <?php echo e($today_user); ?></a>
                        <a class=" btn btn-success text-dark btn-sm">Monthly : <?php echo e($monthly_user); ?></a>
                        <a href="<?php echo e(route('admin.users')); ?>" class=" btn btn-primary btn-sm text-light">Total : <?php echo e($total_user); ?></a>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Phone</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($users->currentpage() - 1) * $users->perpage() + $loop->index + 1); ?></td>
                                        <td><?php echo e($user->phone_num); ?></td>
                                        <td><?php echo e($user->name ?? 'null'); ?></td>
                                        <td>
                                            <?php if($user?->PurchaseDetails): ?>
                                                <?php $__currentLoopData = $user?->PurchaseDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase_detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($loop->last): ?>
                                                        <?php if($purchase_detail->unsubscribed == 0): ?>
                                                            <a class="btn btn-sm btn-primary text-white">Subscribe</a>
                                                        <?php else: ?>
                                                            <a class="btn btn-sm btn-warning text-white">Unsubscribe</a>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                        </td>
                                        <td><?php echo e($user->created_at->diffForHumans()); ?></td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>

                        </table>
                        <?php echo e($users->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/pages/subscriber/all_register.blade.php ENDPATH**/ ?>