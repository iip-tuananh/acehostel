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
                            <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                            <li><a href="{{ route('front.getListRooms') }}">Hạng phòng</a></li>
                            <li><a href="{{ route('front.services') }}">Dịch vụ</a></li>
                            <li><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Về chúng tôi</h4>
                        <ul>
                            <li><a href="{{ route('front.about_page') }}">Về chúng tôi</a></li>
                            <li><a href="{{ route('front.galleries') }}">Thư viện</a></li>
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
