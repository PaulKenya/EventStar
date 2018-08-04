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
            <h1 class="entry-title">Create An event</h1>
        </div>
    </section>
    <section class="section-search-content">
        <div class="container" style="font-family: Montserrat-Regular;">
            <div class="row">
                <form enctype="multipart/form-data" action="<?php echo e(route('created')); ?>" method="post" ><?php echo csrf_field(); ?>

                    <div class="col-md-12">
                        <h2 class="mt-20 custom-bottom-margin">
                            Event Details
                        </h2>
                        <p>Fill the details of the event down below</p>
                        <div class="form-group row">
                            <label for="event_type" class="col-sm-3">EVENT TYPE:</label>
                            <div class="col-sm-9">
                                <select name="event_type" id="event_type" class="col-sm-12" style="height: 34px;">
                                    <option value="Event">Event</option>
                                    <option value="Hackathon">Hackathon</option>
                                    <option value="Training">Training</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_name" class="col-sm-3 col-form-label">EVENT TITLE:</label>
                            <div class="col-sm-9">
                                <input type="text" name="event_name" class="form-control" placeholder="Enter the Name of the Event">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_description" class="col-sm-3 col-form-label">EVENT DESCRIPTION:</label>
                            <div class="col-sm-9">
                                <textarea type="text" name="event_description" class="form-control" placeholder="Enter the Description of the Event" style="height: 150px;"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_date" class="col-sm-3 col-form-label">EVENT DATE:</label>
                            <div class="col-sm-9">
                                <input type="date" name="event_date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_time" class="col-sm-3 col-form-label">STARTING TIME:</label>
                            <div class="col-sm-9">
                                <input type="time" name="event_time" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_location" class="col-sm-3 col-form-label">EVENT LOCATION:</label>
                            <div class="col-sm-9">
                                <input type="text" name="event_location" class="form-control" placeholder="Enter the Location of the Event">
                            </div>
                        </div>
                        <p>Fill the finance details of the event</p>
                        <div class="form-group row">
                            <label for="number_of_tickets_available" class="col-sm-3 col-form-label">NUMBER OF TICKETS AVAILABLE:</label>
                            <div class="col-sm-9">
                                <input type="number" name="number_of_tickets_available" class="form-control" placeholder="Enter the Number of Tickets Available of the Event">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price_per_ticket" class="col-sm-3 col-form-label">PRICE PER TICKETS:</label>
                            <div class="col-sm-9">
                                <input type="number" name="price_per_ticket" class="form-control" placeholder="Enter the Price per Ticket of the Event">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_image" class="col-sm-3 col-form-label">EVENT IMAGE:</label>
                            <div class="col-sm-9">
                                <input type="file" name="event_image" id="event_image" accept="image/*" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event_host" class="col-sm-3 col-form-label">EVENT HOST:</label>
                            <div class="col-sm-9">
                                <input type="text" name="event_host" class="form-control" placeholder="Enter the Host of the Event">
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>