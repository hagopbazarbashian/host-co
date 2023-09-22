<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Hostco Web Hosting</title>
    <link rel="icon" href="{{asset('asset/images/icon.png')}}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Hostco - Modern Web Hosting & WHMCS Template" name="description" >
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- CSS Files
    ================================================== -->
    @include('layout.style')
    <!-- color scheme -->
    <link id="colors" href="css/colors/scheme-01.css" rel="stylesheet" type="text/css" >
</head>
<body>
    <div id="wrapper">

        <!-- page preloader begin -->
        {{-- <div id="de-loader"></div> --}}
        <!-- page preloader close -->

        <!-- header begin -->
        @include('layout.header')
        <!-- header close -->

        {{-- Main  --}}
        @yield('main-content')
        {{-- Main close --}}
        <a href="#" id="back-to-top"></a>


        <!-- footer -->
        @include('layout.footer')
        <!-- footer close -->

    </div>
    <!-- Javascript Files
    ================================================== -->
    @include('layout.script')
    <!-- COOKIES PLUGIN  -->
    <script>
      $(document).ready(function() {
        $.cookit({
          messageColor: '#fff',
          linkColor: '#38b1ed',
          buttonColor: '#38b1ed',
          messageText: "This website uses <b>cookies</b> to ensure you get the best experience on our website.",
          linkText: "Learn more",
          linkUrl: "index.html",
          buttonText: "I accept",
        });
      });
    </script>
</body>




