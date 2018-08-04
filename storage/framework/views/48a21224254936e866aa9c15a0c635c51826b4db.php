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
            <h1 class="entry-title">View Events</h1>
        </div>
    </section>
    <section class="section-page-content">
        <div class="container card" style="font-family: Montserrat-Regular;">
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <table class="table table-striped table-bordered " id="example" style="width:100%">
                            <thead>
                                <tr>
                                    <th><b>TITLE</b></th>
                                    <th><b>EVENT TYPE</b></th>
                                    <th><b>LOCATION</b></th>
                                    <th><b>DATE</b></th>
                                    <th><b>STUDENTS ATTENDING</b></th>
                                    <th><b>TICKETS AVAILABLE</b></th>
                                    <th><b>AMOUNT MADE</b></th>
                                    <th><b>STATUS</b></th>
                                    <th><b>EVENT HOST</b></th>
                                    <th><b></b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(isset($events_results)): ?>
                                    <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $tickets_available = $events_result->number_of_tickets_available - $events_result-> tickets_sold;
                                            $amount_made = $events_result->tickets_sold * $events_result->price_per_ticket;
                                            $tickets_status_code = $events_result->event_status;
                                        ?>
                                        <?php $__currentLoopData = $status_code_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_code_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($status_code_result->status_code==$tickets_status_code): ?>
                                                <?php
                                                $Status=$status_code_result->status_name;
                                                $color=$status_code_result->status_color;
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo e($events_result->event_name); ?></td>
                                            <td style="text-align: center;"><?php echo e($events_result->event_type); ?></td>
                                            <td style="text-align: center;"><?php echo e($events_result->event_location); ?></td>
                                            <td style="text-align: center;"><?php echo e($events_result->event_date); ?></td>
                                            <td style="text-align: center;"><?php echo e($events_result->tickets_sold); ?></td>
                                            <td style="text-align: center;"><?php echo e($tickets_available); ?></td>
                                            <td style="text-align: center;">Ksh. <?php echo e($amount_made); ?></td>
                                            <td style="text-align: center;"><i class="fas fa-circle" style="color: <?php echo e($color); ?>;"></i> <?php echo e($Status); ?></td>
                                            <td style="text-align: center;"><?php echo e($events_result->event_host); ?></td>
                                            <td style="text-align: center;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#events<?php echo e($events_result->id); ?>">
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
    <?php if(isset($events_results)): ?>
        <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="events<?php echo e($events_result->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="<?php echo e(route('changeEventInfo')); ?>" method="post" ><?php echo csrf_field(); ?>

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">CHANGE EVENT INFO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong><?php echo e($events_result->event_name); ?></strong></p>
                                <p>Change Event Status down below.</p>
                                <input type="hidden" name="event_id" value="<?php echo e($events_result->id); ?>">
                                <div class="form-group row">
                                    <label for="event_status" class="col-sm-3">Event Status:</label>
                                    <div class="col-sm-9">
                                        <select name="event_status" id="event_status" class="col-sm-12" style="height: 34px;">
                                            <option value="1">Cancelled</option>
                                            <option value="2">On-going</option>
                                            <option value="3">Out of Date</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Change Event Status</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>