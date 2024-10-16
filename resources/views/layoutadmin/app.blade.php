<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" data-bs-theme-color="default" dir="ltr">
   <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <title data-setting="app_name" data-rightJoin=" Responsive Bootstrap 5 Admin Dashboard Template">Transfer Syetem Admin Panel</title>
      <meta name="description" content="Streamit is a revolutionary Bootstrap Admin Dashboard Template and UI Components Library. The Admin Dashboard Template and UI Component features 8 modules." />
      <meta name="keywords" content="premium, admin, dashboard, template, bootstrap 5, clean ui, streamit, admin dashboard,responsive dashboard, optimized dashboard," />
      <meta name="author" content="Iqonic Design" />
      <meta name="DC.title" content="Streamit Responsive Bootstrap 5 Admin Dashboard Template" />

      <!-- Favicon -->
      @include('layoutadmin.style')

      <body class="  ">
         <!-- loader Start -->
         {{--
         <div id="loading">
            <div class="loader simple-loader">
               <div class="loader-body">
                  <img src="../assets/images/loader-unscreen.gif" class="image-loader img-fluid" />
               </div>
            </div>
         </div>
         --}}
         <!-- loader END -->

         {{-- //////// side bar --}} 
         @include('layoutadmin.side-bar') 
         {{-- //////// side bar --}}
         <main class="main-content">
            <div class="position-relative">
               <!--Nav Start-->
                @include('layoutadmin.nav-bar')
               <!--Nav End-->
            </div>
            @yield('admin-main-content')
            <!-- Footer Section Start -->
            @include('layoutadmin.footer')
            <!-- Footer Section End -->
         </main>


         @include('layoutadmin.script')
      </body>
   </head>
</html>
