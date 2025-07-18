<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    @include('site.partials.head')
    @yield('css')
</head>

<body ng-app="App">
    <!-- lodaer  -->
    <div id="preloader">
        <span class="preloader-dot"></span>
    </div>
    <!-- loader end  -->
    <div id="page-wrap">
        @include('site.partials.header')
        @yield('content')


        @include('site.partials.footer')
    </div>


    <div id="translate_select"></div>
    <script type="text/javascript" src="/site/js/elementa0d8.js?cb=googleTranslateElementInit"></script>


    <script type="text/javascript" src="/site/js/lib/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/bootstrap.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/bootstrap-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
    <script type="text/javascript" src="/site/js/lib/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/owl.carousel.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.appear.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.countTo.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.countdown.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.parallax-1.1.3.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/SmoothScroll.js"></script>
    <!-- validate -->
    <script type="text/javascript" src="/site/js/lib/jquery.form.min.js"></script>
    <script type="text/javascript" src="/site/js/lib/jquery.validate.min.js"></script>
    <!-- Custom jQuery -->
    <script type="text/javascript" src="/site/js/scripts.js"></script>


    @include('site.partials.angular_mix')

    <script>
        var CSRF_TOKEN = "{{ csrf_token() }}";
    </script>

    <script>

        function setActiveLang(lang) {
            const displayText = lang === 'vi' ? 'VI' : 'ENG';
            document.getElementById('current-lang').innerText = displayText;

            document.querySelectorAll('.dropdown.language ul li').forEach(function (li) {
                if (li.getAttribute('data-lang') === lang) {
                    li.classList.add('active');
                } else {
                    li.classList.remove('active');
                }
            });
        }



        function translateheader(lang) {
            localStorage.setItem('selectedLang', lang);
            console.log(lang)


            var sel = document.querySelector("select.goog-te-combo");
            if (!sel) {
                // Nếu chưa có, thử lại sau 100ms
                return setTimeout(function() {
                    translateheader(lang);
                }, 100);
            }

            // 1) Gán giá trị
            sel.value = lang;

            // 2) Tạo event theo chuẩn cũ (HTMLEvents)
            var evOld = document.createEvent("HTMLEvents");
            evOld.initEvent("change", true, true);
            sel.dispatchEvent(evOld);

            // 3) Tạo event theo chuẩn mới (Event constructor)
            var evNew = new Event("change", { bubbles: true, cancelable: true });
            sel.dispatchEvent(evNew);

            setActiveLang(lang);

        }


        document.addEventListener('DOMContentLoaded', function () {
            let savedLang = localStorage.getItem('selectedLang') || 'en';
            setActiveLang(savedLang);
        });


    </script>
    @stack('scripts')
</body>

</html>
