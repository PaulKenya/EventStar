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
<?php $__env->startSection('footer'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {

                labels: [
                    <?php if(isset($events_results)): ?>
                        <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            "<?php echo e($events_result->event_name); ?>",
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                ],
                datasets: [{
                    label: "Amount Made (Ksh.)",
                    backgroundColor: [

                        <?php if(isset($events_results)): ?>
                            <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $letters = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
                                    $color = '#';
                                    for ($i = 0; $i < 6; $i++) {
                                        $count=random_int(0,15);
                                        $color= $color.$letters[$count];
                                    }
                                ?>
                        "<?php echo e($color); ?>",
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>

                    ],
                    data: [
                        <?php if(isset($events_results)): ?>
                            <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $amount_made = $events_result->tickets_sold * $events_result->price_per_ticket;
                                ?>
                            <?php echo e($amount_made); ?>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    ]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Amounts made in the Events'
                }
            }
        });
    </script>
    <script>
        new Chart(document.getElementById("bar-chart"), {
            type: 'bar',
            data: {
                labels: [
                    <?php if(isset($events_results)): ?>
                            <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        "<?php echo e($events_result->event_name); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                ],
                datasets: [
                    {
                        label: "Students Attending",
                        backgroundColor: [
                            <?php if(isset($events_results)): ?>
                                    <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $letters = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F'];
                                        $color = '#';
                                        for ($i = 0; $i < 6; $i++) {
                                            $count=random_int(0,15);
                                            $color= $color.$letters[$count];
                                        }
                                    ?>
                                "<?php echo e($color); ?>",
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        ],
                        data: [
                            <?php if(isset($events_results)): ?>
                            <?php $__currentLoopData = $events_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $events_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $amount_made = $events_result->tickets_sold * $events_result->price_per_ticket;
                            ?>
                            <?php echo e($events_result->tickets_sold); ?>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        ]
                    }
                ]
            },
            options: {
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Students Attending Events'
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section-page-header">
        <div class="container">
            <h1 class="entry-title">Events Reports</h1>
        </div>
    </section>
    <section class="section-page-content">
        <div class="container card" style="font-family: Montserrat-Regular;">
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <canvas id="pie-chart" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card-body">
                    <div class="card-box table-responsive">
                        <canvas id="bar-chart" width="800" height="450"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>