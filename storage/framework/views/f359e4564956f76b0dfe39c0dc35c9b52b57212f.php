

<?php $__env->startSection('pageName'); ?>
    Blogs
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <!-- Footable CSS -->
    <link href="<?php echo e(asset('/assets/backend/plugins/footable/css/footable.core.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="<?php echo e(route('admin.blog.create')); ?>" class="btn btn-sm btn-primary">Add New</a>
                    <h6 class="card-subtitle"></h6>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Banner</th>
                                    <th>Thumbnail</th>
                                    <th>Created_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(($blogs->currentpage() - 1) * $blogs->perpage() + $loop->index + 1); ?></td>
                                        <td><?php echo e(Str::limit($blog->title, 30)); ?></td>
                                        <td>
                                            <img src="<?php echo e(asset('uploads/Blogs/banner/' . $blog->banner)); ?>" alt="banner"
                                                width="40" class="img-circle" />
                                        </td>
                                        <td>
                                            <img src="<?php echo e(asset('uploads/Blogs/thumbnail/' . $blog->thumbnail)); ?>"
                                                alt="thumbnail" width="40" class="img-circle" />
                                        </td>

                                        <td><?php echo e($blog->created_at->diffForHumans()); ?></td>

                                        <td>
                                            <a href="<?php echo e(route('admin.blog.edit', $blog->id)); ?>" data-toggle="tooltip" data-original-title="Edit"
                                                style="background: transparent; border: none;">
                                                <i class="fa fa-pencil text-inverse m-r-10"></i> </a>

                                            <a href="#" name="<?php echo e(route('admin.blog.delete', $blog->id)); ?>" class="delete-confirm" data-toggle="tooltip" data-original-title="delete"
                                                style="background: transparent; border: none;">
                                                <i class="fa fa-close text-danger"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    $('.delete-confirm').click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "If you delete this, it will be gone forever !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr('name');
                window.location.href = link;
            }
        })
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/pages/blogs/index.blade.php ENDPATH**/ ?>