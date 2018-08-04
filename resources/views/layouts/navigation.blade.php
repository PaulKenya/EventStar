
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
                        @guest
                        <li>
                            <a href="{{route('login')}}">Sign In</a>
                        </li>
                        <li>
                            <a href="{{route('register')}}">Sign Up</a>
                        </li>
                            @else
                            <li>
                                <a href="#">{{Illuminate\Support\Facades\Auth::user()->name}}</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">Sign Out</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="main-header main-header-bg">
        <div class="container">
            <div class="row">
                <div class="site-branding col-md-1">
                    <img src="{{asset('uon_logo.png')}}" alt="Event Star" width="45px" height="45px">
                </div>
                <div class="site-branding col-md-2">
                    <h1 class="site-title"><a href="{{route('home')}}" title="myticket" rel="home"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a></h1>
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
                                @if(Auth::user()->user_type==0)
                                    <li><a href="{{route('create')}}">Create Event</a></li>
                                    <li><a href="{{route('viewEvents')}}">View Event</a></li>
                                    <li><a href="{{route('viewUsers')}}">View Users</a></li>
                                    <li><a href="{{route('report')}}">Reports</a></li>
                                    @else
                                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('events')}}">Events</a></li>
                                    <li><a href="{{route('hackathon')}}">Hackathon</a></li>
                                    <li><a href="{{route('training')}}">Training</a></li>
                                    <li class="cart"><a href="{{route('viewCart')}}">@yield('count')</a></li>
                                @endif
                            </ul>
                        </div>
                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div>
    </div>
</header><!-- #masthead -->