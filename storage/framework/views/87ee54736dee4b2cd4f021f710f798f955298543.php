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

    <section class="section-featured-header all-sports-events">
        <div class="container">
            <div class="section-content">
                <h1>All Training Events</h1>
            </div>
        </div>
    </section>

    <section class="section-search-content">
        <div class="container">
            <div class="row">
                <div id="primary" class="col-md-12">

                    <div class="search-result-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2>All Sports Events at San Francisco</h2>
                                <?php
                                    $count=0;
                                    if(isset($events_details_results)){
                                        foreach ($events_details_results as $result){
                                            $count=$count+1;
                                        }
                                    }
                                ?>
                                <span>Showing 1-<?php echo e($count); ?> of <?php echo e($count); ?> Results</span>
                            </div>
                        </div>
                    </div>
                    <?php if(isset($events_details_results)): ?>
                        <?php $__currentLoopData = $events_details_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_details_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $date=$events_details_result->event_date;
                                $day_of_week = date('l', strtotime($date));
                                $date_number = date('d', strtotime($date));
                                $month_text = date('M', strtotime($date));
                                $year_number = date('Y', strtotime($date));
                            ?>
                            <div class="search-result-item">
                                <div class="row">
                                    <div class="search-result-item-info col-sm-9">
                                        <h3><?php echo e($events_details_result->event_name); ?></h3>
                                        <ul class="row">
                                            <li class="col-sm-5 col-lg-6">
                                                <span>Venue</span>
                                                <?php echo e($events_details_result->event_location); ?>

                                            </li>
                                            <li class="col-sm-4 col-lg-3">
                                                <span><?php echo e($day_of_week); ?></span>
                                                <?php echo e($month_text); ?>. <?php echo e($date_number); ?>th, <?php echo e($year_number); ?>

                                            </li>
                                            <li class="col-sm-3">
                                                <span>Time</span>
                                                <?php echo e($events_details_result->event_time); ?> HRS
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="search-result-item-price col-sm-3">
                                        <span>Price From</span>
                                        <strong>Ksh. <?php echo e($events_details_result->price_per_ticket); ?></strong>
                                        <a href="/book/<?php echo e($events_details_result->id); ?>">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>