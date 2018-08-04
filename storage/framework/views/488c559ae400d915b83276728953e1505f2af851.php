<?php $__env->startSection('count'); ?>
    <?php
        $count_cart=0;
    ?>
    <?php if(isset($cart_results)): ?>
        <?php $__currentLoopData = $cart_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $count_cart=$count_cart+1;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php echo e($count_cart); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section-page-header">
        <div class="container">
            <h1 class="entry-title">View Users</h1>
        </div>
    </section>
    <section class="section-search-content">
        <div class="container card" style="font-family: Montserrat-Regular;">
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered " id="example" style="width:100%">
                            <thead>
                            <tr>
                                <th><b>NAME</b></th>
                                <th><b>EMAIL ADDRESS</b></th>
                                <th><b>USER TYPE</b></th>
                                <th><b></b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($users_results)): ?>
                                <?php $__currentLoopData = $users_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $user_type_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_type_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($user_type_result->user_type_code==$users_result->user_type): ?>
                                            <?php
                                                $type=$user_type_result->user_type_name;
                                            ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo e($users_result->name); ?></td>
                                        <td style="text-align: center;"><?php echo e($users_result->email); ?></td>
                                        <td style="text-align: center;"><?php echo e($type); ?></td>
                                        <td style="text-align: center;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#user<?php echo e($users_result->id); ?>">
                                                Edit
                                            </button></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($users_results)): ?>
        <?php $__currentLoopData = $users_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="user<?php echo e($users_result->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="<?php echo e(route('changeUserPermissions')); ?>" method="post" ><?php echo csrf_field(); ?>

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">CHANGE PERMISSIONS</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><?php echo e($users_result->name); ?></p>
                                <p>Change permissions of the above user down below.</p>
                                <input type="hidden" name="user_id" value="<?php echo e($users_result->id); ?>">
                                <div class="form-group row">
                                    <label for="user_type" class="col-sm-3">User Type:</label>
                                    <div class="col-sm-9">
                                        <select name="user_type" id="user_type" class="col-sm-12" style="height: 34px;">
                                            <option value="0">Admin</option>
                                            <option value="1">Student</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Change Permissions</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>