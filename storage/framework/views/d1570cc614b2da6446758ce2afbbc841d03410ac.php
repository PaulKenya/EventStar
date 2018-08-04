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
            <h1 class="entry-title">University of Nairobi Events</h1>
        </div>
    </section>

    <?php
        $div_counter=1;
    ?>
    <section class="section-full-events-schedule">
        <div class="container">
            <div class="row">
                <div class="section-header">
                    <ul class="nav nav-tabs event-tabs" role="tablist">
                        <?php if(isset($grouped_event_date_results)): ?>
                            <?php $__currentLoopData = $grouped_event_date_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grouped_event_date_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li role="presentation"
                                    <?php if($div_counter==1): ?>
                                    class="active"
                                    <?php else: ?>
                                            <?php endif; ?>
                                >
                                    <a href="#tab<?php echo e($div_counter); ?>" role="tab" data-toggle="tab">
                                        <?php
                                            $div_counter = $div_counter+1;
                                            $date=$grouped_event_date_result->event_date;
                                            $day_of_week = date('l', strtotime($date));
                                            $date_number = date('d', strtotime($date));
                                            $month_text = date('M', strtotime($date));
                                            $year_number = date('Y', strtotime($date));
                                        ?>
                                        <strong><?php echo e($day_of_week); ?></strong>
                                        <?php echo e($date_number); ?>

                                        <span><?php echo e($month_text); ?> <?php echo e($year_number); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="section-content">
                    <div class="tab-content">
                        <?php
                            $tab_counter = 0;
                            $activated_text = 0;
                        ?>
                        <?php if(isset($grouped_event_date_results)): ?>
                            <?php $__currentLoopData = $grouped_event_date_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grouped_event_date_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $tab_counter=$tab_counter+1;
                                    $sort_by_date=$grouped_event_date_result->event_date;
                                ?>
                                <div role="tabpanel"
                                     <?php if($tab_counter==1): ?>
                                     class="tab-pane active"
                                     <?php else: ?>
                                     class="tab-pane"
                                     <?php endif; ?>
                                     id="tab<?php echo e($tab_counter); ?>">
                                    <div class="row">
                                        <div class="col-sm-4 col-md-3">
                                            <ul class="nav" role="tablist">
                                                <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result_a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($events_result_a->event_date ==$sort_by_date): ?>
                                                        <?php
                                                            $activated_text++;
                                                            $remaining_tickets= $events_result_a->number_of_tickets_available - $events_result_a->tickets_sold;
                                                        ?>
                                                        <li>
                                                            <a href="#det<?php echo e($events_result_a->id); ?>" aria-controls="tab1-hr1" role="tab" data-toggle="tab">
                                                                <span class="schedule-time"><?php echo e($events_result_a->event_time); ?> <strong>HRS</strong></span>
                                                                <span class="schedule-title"><?php echo e($events_result_a->event_name); ?></span>
                                                                <span class="schedule-ticket-info"><?php echo e($remaining_tickets); ?> tickets left</span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                        <div class="col-sm-8 col-md-9">
                                            <div class="tab-content">
                                                <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result_b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($events_result_b->event_date ==$sort_by_date): ?>
                                                        <?php
                                                            $remaining_tickets_event= $events_result_b->number_of_tickets_available - $events_result_b->tickets_sold;
                                                            $date_event = $events_result_b->event_date;
                                                            $day_of_week_event = date('l', strtotime($date_event));
                                                            $date_number_event = date('d', strtotime($date_event));
                                                            $month_text_event = date('M', strtotime($date_event));
                                                            $year_number_event = date('Y', strtotime($date_event));
                                                        ?>
                                                        <div role="tabpanel" class="tab-pane" id="det<?php echo e($events_result_b->id); ?>">
                                                            <img src="<?php echo e(asset('assets/images/full-event-schedule-img.jpg')); ?>" alt="image">
                                                            <div class="full-event-info">
                                                                <div class="full-event-info-header">
                                                                    <h2><?php echo e($events_result_b->event_name); ?></h2>
                                                                    <span class="ticket-left-info"><?php echo e($remaining_tickets_event); ?> Tickets Left</span>
                                                                    <div class="clearfix"></div>
                                                                    <span class="event-date-info"><?php echo e($day_of_week_event); ?>, <?php echo e($month_text_event); ?> <?php echo e($date_number_event); ?> <?php echo e($year_number_event); ?> | <?php echo e($events_result_b->event_time); ?></span>
                                                                    <span class="event-venue-info"><?php echo e($events_result_b->event_location); ?></span>
                                                                </div>
                                                                <div class="full-event-info-content">
                                                                    <p><?php echo e($events_result_b->event_description); ?></p>
                                                                    <a class="book-ticket" href="/book/<?php echo e($events_result_b->id); ?>">Book Ticket</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>