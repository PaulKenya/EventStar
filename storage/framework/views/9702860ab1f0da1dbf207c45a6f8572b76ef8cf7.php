
<header id="masthead" class="site-header">
    <div class="top-header top-header-bg">
        <div class="container">
            <div class="row">
                <div class="top-left">
                    <ul>
                        <li>
                            <a href="#">
                                <i class="fa fa-phone"></i>
                                +254722334455
                            </a>
                        </li>
                        <li>
                            <a href="mailto:hello@myticket.com">
                                <i class="fa fa-envelope-o"></i>
                                hello@eventstar.com
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="top-right">
                    <ul>
                        <?php if(auth()->guard()->guest()): ?>
                        <li>
                            <a href="<?php echo e(route('login')); ?>">Sign In</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('register')); ?>">Sign Up</a>
                        </li>
                            <?php else: ?>
                            <li>
                                <a href="#"><?php echo e(Illuminate\Support\Facades\Auth::user()->name); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Sign Out</a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="main-header main-header-bg">
        <div class="container">
            <div class="row">
                <div class="site-branding col-md-1">
                    <img src="<?php echo e(asset('uon_logo.png')); ?>" alt="Event Star" width="45px" height="45px">
                </div>
                <div class="site-branding col-md-2">
                    <h1 class="site-title"><a href="<?php echo e(route('home')); ?>" title="myticket" rel="home"><img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="logo"></a></h1>
                </div>

                <div class="col-md-9">
                    <nav id="site-navigation" class="navbar">
                        <!-- toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <div class="mobile-cart" ><a href="#">0</a></div>
                            <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-right" id="js-bootstrap-offcanvas">
                            <button type="button" class="offcanvas-toggle closecanvas" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
                                <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                            </button>

                            <ul class="nav navbar-nav navbar-right">
                                <?php if(Auth::user()->user_type==0): ?>
                                    <li><a href="<?php echo e(route('create')); ?>">Create Event</a></li>
                                    <li><a href="<?php echo e(route('viewEvents')); ?>">View Event</a></li>
                                    <li><a href="<?php echo e(route('viewUsers')); ?>">View Users</a></li>
                                    <li><a href="<?php echo e(route('report')); ?>">Reports</a></li>
                                    <?php else: ?>
                                    <li class="active"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                                    <li><a href="<?php echo e(route('events')); ?>">Events</a></li>
                                    <li><a href="<?php echo e(route('hackathon')); ?>">Hackathon</a></li>
                                    <li><a href="<?php echo e(route('training')); ?>">Training</a></li>
                                    <li class="cart"><a href="<?php echo e(route('viewCart')); ?>"><?php echo $__env->yieldContent('count'); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->