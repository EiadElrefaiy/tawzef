<!doctype html>
<html lang="ar">

<!-- Mirrored from codeminifier.com/job-stock-landing-page/job-stock/signin-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 25 Aug 2019 10:03:15 GMT -->

<head>
    <!-- Basic Page Needs
	================================================== -->
    <title> برنامج توظيف الخريجين </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
	================================================== -->
    <link rel="stylesheet" href="{{URL::asset('assets/site/assets/plugins/css/plugins.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/site/assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/site/assets/css/bootstrap-rtl.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/site/assets/css/owl-carousel.min.css')}}">



    <!-- Custom style -->
    <link href="{{URL::asset('assets/site/assets/css/style.css')}}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="{{URL::asset('assets/site/assets/css/colors/blue-style.css')}}">
    <link href="{{URL::asset('assets/site/assets/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('assets/site/assets/css/rtl.css')}}">

    <script src="{{URL::asset('assets/site/assets/js/jquery.min.js')}}"></script>

</head>

<body>
    <div class="wrapper">

        @include('components.header')


        @yield('content')


        @include('components.footer')

        <!-- Scripts
            ================================================== -->
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/jquery.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/viewportchecker.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/bootstrap.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/bootsnav.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/select2.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/datedropper.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/dropzone.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/loader.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/js/slicknav.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/js/owl.carousel.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/slick.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/gmap3.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/js/jquery.easy-autocomplete.min.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/plugins/ckeditor/ckeditor.js')}}"></script>

            <!-- Custom Js -->
            <script type="text/javascript" src="{{URL::asset('assets/site/assets/js/custom.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $('.select2').select2()
            });
        </script>

        <script>
            $('.exp-start').dateDropper();
        </script>

        <script>
            $('.exp-end').dateDropper();
        </script>

    </div>
 </body>
</html>