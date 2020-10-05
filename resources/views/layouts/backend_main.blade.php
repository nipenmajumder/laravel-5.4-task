<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>@yield('title')</title>
      <link rel="icon" href="img/core-img/favicon1.png">
      @include('layouts.backend_css')
   </head>
   <body>
      <div id="preloader"></div>
      <div class="ecaps-page-wrapper">
         <!-- Sidemenu Area -->
         @include('layouts.backend_sidebar')
         <!-- Page Content -->
         <div class="ecaps-page-content">
            <!-- Top Header Area -->
            @include('layouts.backend_nav')
            <!-- Main Content Area -->
            <div class="main-content">
               <div class="dashboard-area">
                  @yield('main_content')
               </div>
               <!-- Footer Area -->
               @include('layouts.backend_footer')
            </div>
         </div>
      </div>
      @include('layouts.backend_js')
   </body>
</html>