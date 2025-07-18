<footer id="footer">
    <!-- FOOTER TOP -->
    <div class="footer_top">
        <div class="container">
            <div class="row">

                <!-- WIDGET MAILCHIMP -->
                <div class="col-lg-9">
                </div>
                <!-- END / WIDGET MAILCHIMP -->

                <!-- WIDGET SOCIAL -->
                <div class="col-lg-3">
                    <div class="social">
                        <div class="social-content">
                            <a href="{{ $config->facebook }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $config->twitter }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $config->instagram }}"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET SOCIAL -->

            </div>
        </div>
    </div>
    <!-- END / FOOTER TOP -->

    <!-- FOOTER CENTER -->
    <div class="footer_center">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-lg-5">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            <div class="img">
                                <a href="#"><img src="{{ $config->image->path ?? '' }}" alt=""></a>
                            </div>
                            <div class="text">
                                <p><i class="lotus-icon-location"></i>{{ $config->address_company }}</p>
                                <p><i class="lotus-icon-phone"></i>{{ $config->hotline }}</p>
                                <p><i class="fa fa-envelope-o"></i>{{ $config->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Menu</h4>
                        <ul>
                            <li><a href="{{ route('front.home-page') }}">Home</a></li>
                            <li><a href="{{ route('front.getListRooms') }}">Rooms</a></li>
                            <li><a href="{{ route('front.services') }}">Services</a></li>
                            <li><a href="{{ route('front.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">About Us</h4>
                        <ul>
                            <li><a href="{{ route('front.about_page') }}">About Us</a></li>
                            <li><a href="{{ route('front.galleries') }}">Photos</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END / FOOTER CENTER -->

    <!-- FOOTER BOTTOM -->
    <div class="footer_bottom">
        <div class="container">
            <p>&copy; 2025 Ace Hotel All rights reserved.</p>
        </div>
    </div>
    <!-- END / FOOTER BOTTOM -->

</footer>
