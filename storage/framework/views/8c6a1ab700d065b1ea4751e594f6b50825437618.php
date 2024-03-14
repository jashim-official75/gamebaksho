

<?php $__env->startSection('pageName'); ?>
    Contact Center
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Contact center</h4>
                    <h5 class="card-subtitle">Total Contact requests <b><?php echo e($supports->total()); ?></b></h5>
                    <?php if(Route::currentRouteName() == 'dashboard.support'): ?>
                        <div>
                            <a href="<?php echo e(route('dashboard.support.unread')); ?>"
                                class="btn btn-secondary waves-effect text-dark" data-dismiss="modal">Show all unread</a>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Time</th>
                                    <th>Seen</th>
                                    <th>Actions</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php $__currentLoopData = $supports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $support): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr <?php if(!$support->seen): ?> class="bg-dark text-white" <?php endif; ?>>

                                        <td><?php echo e($loop->index + 1); ?>

                                        </td>
                                        <td><?php echo e($support->name); ?></td>
                                        <td><?php echo e($support->email); ?></td>
                                        <td><?php echo e(Str::limit($support->comment, 40)); ?></td>
                                        <td><?php echo e($support->created_at->diffForhumans()); ?></td>
                                        <td><?php echo e($support->seen == 1 ? 'yes' : 'no'); ?></td>
                                        <td>
                                            <a href="#" style="background: transparent; border: none;" data-toggle="modal"
                                                data-target="#problem-details<?php echo e($loop->index + 1); ?>">
                                                <i class=" fa fa-eye <?php if(!$support->seen): ?> text-white <?php else: ?> text-inverse <?php endif; ?> m-r-10" data-toggle="tooltip"
                                                    data-original-title="Details"></i> </a>
                                            
                                            <div id="problem-details<?php echo e($loop->index + 1); ?>" class="modal fade in"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-hidden="true">×</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table id="demo-foo-addrow"
                                                                class="table m-t-30 table-hover contact-list"
                                                                data-page-size="10">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Problem</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td><?php echo e($support->comment); ?>

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form
                                                                action="<?php echo e(route('admin.support.mark', $support->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <button class="btn btn-primary waves-effect text-white">Mark
                                                                    as
                                                                    Seen</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>

                                            <a href="<?php echo e(route('admin.contact.delete', $support->id)); ?>"><i class="fa fa-close"></i></a>

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

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/pages/support/contact.blade.php ENDPATH**/ ?>