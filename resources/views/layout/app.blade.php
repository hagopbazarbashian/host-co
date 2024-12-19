<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Hostco Transfer System</title>
    <link rel="icon" href="{{asset('asset/images/icon.png')}}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <meta content="Hostco - Transfer System" name="description" >
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <meta content="" name="keywords" >
    <meta content="" name="author" >
    <!-- Other meta tags and headers -->
    <meta property="og:title" content="Transfer">
    <meta property="og:description" content="At transfer.smartdevelop.am, we make transferring images and files easy, fast, and free. Whether you need to share large files with colleagues, friends, or clients, our service is designed to handle it all with no restrictions on file size. Users can also securely store files or photos for future access.">
    <meta property="og:image" content="https://transfer.smartdevelop.am/asset/images/B4664469-1F94-4AF2-875A-D1041BB4553C.jpg">
    <meta property="og:url" content="transfer.smartdevelop.am">
    <meta property="og:type" content="website App">
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
    {{-- <script>
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
    </script> --}}
    @if ($errors->any())
  @foreach ($errors->all() as $error)
  <script>
      iziToast.error({
      title: '',
      position: 'topRight',
      message: '<span">{{ $error }}</span>',
  });
  </script>
  @endforeach

  @endif

  @if (session()->get('error'))
  <script>
      iziToast.error({
      title: '',
      position: 'topRight',
      message: '<span class="error-text">{{ session()->get('error') }}</span>',
  });
  </script>
  @endif

  @if (session()->get('succes'))
  <script>
      iziToast.success({
      title: '',
      position: 'topRight',
      message: '<span class="success-text">{{ session()->get('succes') }}</span>',
  });
  </script>
  @endif
</body>




