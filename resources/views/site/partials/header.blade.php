<header id="header">

    <!-- HEADER TOP -->
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span><i class="lotus-icon-location"></i>{{ $config->address_company }}</span>
                <span><i class="lotus-icon-phone"></i>{{ $config->hotline }}</span>
            </div>
            <div class="header_right float-right">

                <div class="dropdown language notranslate" translate="no">
                    <span id="current-lang">ENG</span>

                    <ul>
                        <li data-lang="en" onclick="translateheader('en')"><a href="#">English</a></li>
                        <li data-lang="vi" onclick="translateheader('vi')"><a href="#">Vietnamese</a></li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!-- END / HEADER TOP -->

    <!-- HEADER LOGO & MENU -->
    <div class="header_content" id="header_content">

        <div class="container">
            <!-- HEADER LOGO -->
            <div class="header_logo">
                <a href="{{ route('front.home-page') }}"><img src="{{ $config->image->path ?? '' }}" alt=""></a>
            </div>
            <!-- END / HEADER LOGO -->

            <!-- HEADER MENU -->
            <nav class="header_menu">
                <ul class="menu">
                    <li><a href="{{ route('front.home-page') }}">Trang chủ</a></li>
                    <li><a href="{{ route('front.getListRooms') }}">Hạng phòng</a></li>
                    <li><a href="{{ route('front.services') }}">Dịch vụ</a></li>
                    <li><a href="{{ route('front.galleries') }}">Thư viện</a></li>
                    <li><a href="{{ route('front.about_page') }}">Về chúng tôi</a></li>
                    <li><a href="{{ route('front.contact') }}">Liên hệ</a></li>
                </ul>
            </nav>
            <!-- END / HEADER MENU -->

            <!-- MENU BAR -->
            <span class="menu-bars">
                        <span></span>
                    </span>
            <!-- END / MENU BAR -->

        </div>
    </div>
    <!-- END / HEADER LOGO & MENU -->

</header>
