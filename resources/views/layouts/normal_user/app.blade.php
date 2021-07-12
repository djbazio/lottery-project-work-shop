<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('be_home_template/Upload/img/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('be_home_template/Upload/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('be_home_template/Upload/img/favicon-16x16.png') }}">

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- All Styles -->
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/iconfont/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/Menuzord/css/menuzord.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/animate/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/lib/aos/aos.css') }}">

    <!-- Theme Styels -->
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('be_home_template/Upload/css/responsive.css') }}">

    <!-- Color Style -->
    <!-- <link rel="stylesheet" href="css/light-blue.css">
    <link rel="stylesheet" href="css/orange-color.css">
    <link rel="stylesheet" href="css/blue-color.css">
    <link rel="stylesheet" href="css/green-color.css">
    <link rel="stylesheet" href="css/primary-color.css"> -->

    <title>Behome - Real Estate HTML Template</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="real estate html template">
    <meta name="keywords" content="real estate, mortgage, your keywords, Behome">

    {{-- sweetalert2 --}}
    <script src="{{ asset('sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.min.css') }}">
</head>

<body>
    <div id="app">

        <!-- Back to Top Button -->
        <a id="top-button" href="#"><i class="fas fa-chevron-up"></i></a>
        <!-- End of Back to Top -->

        <!-- Preloader -->
        <div class="preloader-layout">
            <div class="cube-wrapper">
                <div class="cube-folding">
                    <span class="leaf1"></span>
                    <span class="leaf2"></span>
                    <span class="leaf3"></span>
                    <span class="leaf4"></span>
                </div>
                <span class="loading" data-name="loading">Loading</span>
            </div>
        </div>

        <!--
    ========================================
        Header Section
    ========================================
    -->
        @include('layouts.normal_user.header')


        <main class="py-4">
            @yield('content')
        </main>


        <!--
    ========================================
        Footer Section
    ========================================
    -->
        @include('layouts.normal_user.footer')
    </div>


    <!-- Scripts -->
    <script src="{{ asset('be_home_template/Upload/lib/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/counterup/waypoints.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/Menuzord/js/menuzord.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/isotope/isotope.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/aos/aos.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/retina/retina.min.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/lib/slick/slick.min.js') }}"></script>

    <!-- Custom Scripts -->
    <script src="{{ asset('be_home_template/Upload/js/behome.js') }}"></script>
    <script src="{{ asset('be_home_template/Upload/js/slider.js') }}"></script>

    <!-- Select2 -->
    <link href="{{asset('select2/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('select2/select2.min.js')}}"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        //อัพโหลดโชวรูปและชื่อ logoคือid inputfile [input id='logo']
        pic.onchange = evt => {
            const [file] = pic.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }


        //name
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });
    </script>
</body>

</html>
