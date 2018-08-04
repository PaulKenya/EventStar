
<footer id="colophon" class="site-footer">
    <div class="top-footer">
        <div class="container">
            <div class="row">

                <div class="col-md-8">
                    <a href="{{route('home')}}"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                </div>
                <div class="col-md-4">

                    <p>&copy;{{date("Y")}} EVENTSTAR.COM. ALL RIGHTS RESERVED</p>
                </div>
            </div>

        </div>
    </div>
    <div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="footer-1 col-md-9">
                    <div class="about clearfix">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#">Our Company</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Advertising</a></li>
                            <li><a href="#">Press Room</a></li>
                            <li><a href="#">Trademarks</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                    <div class="support clearfix">
                        <h3>Support and Contact</h3>
                        <ul>
                            <li><a href="#">Customer Support Contacts</a></li>
                            <li><a href="#">Feedback</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>

                    <div class="social clearfix">
                        <h3>Stay Connected</h3>
                        <ul>
                            <li class="facebook">
                                <a href="https://www.facebook.com/eventstar">
                                    <i class="fas fa-facebook" aria-hidden="true"></i>
                                    Facebook
                                </a>
                            </li>
                            <li class="twitter">
                                <a href="https://www.twitter.com/eventstar">
                                    <i class="fas fa-twitter" aria-hidden="true"></i>
                                    Twitter
                                </a>
                            </li>
                            <li class="linkedin">
                                <a href="https://www.linkedin.com/eventstar">
                                    <i class="fas fa-linkedin-square" aria-hidden="true"></i>
                                    LinkedIn
                                </a>
                            </li>
                            <li class="google">
                                <a href="https://plus.google.com/eventstar">
                                    <i class="fas fa-google-plus-square" aria-hidden="true"></i>
                                    Google+
                                </a>
                            </li>
                            <li class="rss">
                                <a href="https://www.rss.com/eventstar">
                                    <i class="fas fa-rss-square" aria-hidden="true"></i>
                                    RSS
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="footer-2 col-md-3">
                    <div class="footer-dashboard">
                        <h3>Event-Star Menus</h3>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('events')}}">Events</a></li>
                            <li><a href="{{route('hackathon')}}">Hackathon</a></li>
                            <li><a href="{{route('training')}}">Training</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer><!-- #colophon -->

@yield('footer')
<script src="{{asset('assets/js/jquery-3.2.0.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.scrolling-tabs.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.flexslider-min.js')}}"></script>
<script src="{{asset('assets/js/jquery.imagemapster.min.js')}}"></script>
<script src="{{asset('assets/js/tooltip.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/featherlight.min.js')}}"></script>
<script src="{{asset('assets/js/featherlight.gallery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.offcanvas.min.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.17/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.17/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

<script src={{asset("assets/plugins/datatables/buttons.print.min.js")}}></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel','pdf', 'print', 'colvis', ]
        } );

        table.buttons().container()
            .appendTo( '#example_wrapper .col-sm-6:eq(0)' );

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>



</body>

</html>