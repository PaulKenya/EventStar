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
            <h1 class="entry-title"><?php echo e(Illuminate\Support\Facades\Auth::user()->name); ?>'s Cart</h1>
        </div>
    </section>
    <section class="section-page-content">
        <div class="container card" style="font-family: Montserrat-Regular;">
            <div class="row">
                <div class="card-body">
                    <?php
                        $get_status=0;
                    ?>
                    <?php if(isset($cart_results)): ?>
                        <?php $__currentLoopData = $cart_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $get_status=$get_status+1;
                            ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($get_status>=1): ?>)
                            <div class="stage-name">
                                <h3>INVOICE #<?php echo e(Illuminate\Support\Facades\Auth::user()->id); ?></h3>
                                <p>MAKE PAYMENT</p>
                                <p>100% secure payments processed by PayPal and secured by Verisign SSL. In order to protect your card from unauthorised use, PayPal may request further proof of card ownership.</p>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;"><b>EVENT NAME</b></th>
                                            <th style="text-align: center;"><b>NUMBER OF TICKETS BOUGHT</b></th>
                                            <th style="text-align: center;"><b>PRICE PER TICKET</b></th>
                                            <th style="text-align: center;"><b>TOTAL COST</b></th>
                                            <th style="text-align: center;"><b></b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $total_cost=0;
                                    ?>

                                    <?php $__currentLoopData = $cart_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $cost=$cart_result->cart_tickets*$cart_result->price_per_tickets;
                                            $total_cost=$total_cost+$cost;
                                        ?>
                                        <tr>
                                            <td style="text-align: center;"><?php echo e($cart_result->event_name); ?></td>
                                            <td style="text-align: center;"><?php echo e($cart_result->cart_tickets); ?> Ticket</td>
                                            <td style="text-align: center;">Ksh. <?php echo e($cart_result->price_per_tickets); ?></td>
                                            <td style="text-align: center;">Ksh. <?php echo e($cost); ?></td>
                                            <td style="text-align: center;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cart<?php echo e($cart_result->id); ?>">
                                                    Remove
                                                </button></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div>
                                    <p style="font-size: 45px;text-align: center;"><strong>Total Cost is Ksh. <?php echo e($total_cost); ?></strong></p>
                                </div>
                            </div>
                            <div class="stage-name">
                                <div class="form-group">
                                    <a href="<?php echo e(route('cartCheckout')); ?>" target="_blank" class="btn btn-success" onClick="window.location.reload()">CHECKOUT</a>
                                    <a href="<?php echo e(route('home')); ?>" class="btn btn-success">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                            <?php else: ?>
                                <div class="stage-name">
                                    <h3><?php echo e(Illuminate\Support\Facades\Auth::user()->name); ?>'s Cart</h3>
                                    <p>Hey <?php echo e(Illuminate\Support\Facades\Auth::user()->name); ?>. You have nothing in your Cart. Go get yourself some tickets on event happening in our University.</p>
                                    <div class="form-group">
                                        <a href="<?php echo e(route('home')); ?>" class="btn btn-success">GO SHOPPING</a>
                                    </div>
                                </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php if(isset($cart_results)): ?>
        <?php $__currentLoopData = $cart_results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="cart<?php echo e($cart_result->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="<?php echo e(route('removeFromCart')); ?>" method="post" ><?php echo csrf_field(); ?>

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">REMOVE FROM CART</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><strong><?php echo e($cart_result->event_name); ?></strong></p>
                                <p>Are you sure you want to remove from cart?</p>
                                <input type="hidden" name="cart_id" value="<?php echo e($cart_result->id); ?>">
                                <input type="hidden" name="new_cart_status" value="2">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Remove From Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>