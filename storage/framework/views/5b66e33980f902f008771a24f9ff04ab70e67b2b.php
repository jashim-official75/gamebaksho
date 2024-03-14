

<?php $__env->startSection('pageName'); ?>
    Subscribers
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="head">
                        <a href="<?php echo e(route('admin.subscriber')); ?>" class=" btn btn-sm btn-primary text-light">Total : <?php echo e($total_sub); ?></a>
                        <a class=" btn btn-info btn-sm text-light">Today : <?php echo e($today_sub); ?></a>
                        <a class=" btn btn-success btn-sm text-dark">Monthly : <?php echo e($monthly_sub); ?></a>
                        <a href="<?php echo e(route('admin.current.subscriber')); ?>" class=" btn btn-sm btn-primary text-light">Current Subscribe : <?php echo e($current_subscriber); ?></a>
                        <a href="<?php echo e(route('admin.user.subscriber')); ?>" class=" btn btn-sm btn-primary text-light">Renew Subscribe : <?php echo e($subscribers_count); ?></a>
                        <a href="<?php echo e(route('admin.user.unsubscribe')); ?>" class=" btn btn-sm btn-primary text-light">Unsubscribe : <?php echo e($unsubscribers); ?></a>
                    </div>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Phone</th>
                                    <th>Name</th>
                                    <th>Plan</th>
                                    <th>Day</th>
                                    <th>Amount</th>
                                    <th>Renew</th>
                                    <th>Status</th>
                                    <th>Created_At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $subscribers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscriber): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($subscribers->currentpage() - 1) * $subscribers->perpage() + $loop->index + 1); ?></td>
                                        <td><?php echo e($subscriber->Subscriber->phone_num); ?></td>
                                        <td><?php echo e($subscriber->Subscriber->name ?? 'Null'); ?></td>
                                        <td><?php echo e($subscriber->subscription_plan); ?></td>
                                        <td><?php echo e($subscriber->subscription_day); ?></td>
                                        <td><?php echo e($subscriber->amount); ?></td>
                                        <td><?php echo e($subscriber->renew); ?></td>
                                        <td>
                                            <?php if($subscriber->unsubscribed == 0): ?>
                                                <a class="btn btn-sm btn-primary text-light">Subscriber</a>
                                            <?php else: ?>
                                            <a class="btn btn-sm btn-warning">Unsubscriber</a>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($subscriber->created_at->diffForHumans()); ?></td>
                                        
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                            
                        </table>
                        <?php echo e($subscribers->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/pages/subscriber/subscriber.blade.php ENDPATH**/ ?>