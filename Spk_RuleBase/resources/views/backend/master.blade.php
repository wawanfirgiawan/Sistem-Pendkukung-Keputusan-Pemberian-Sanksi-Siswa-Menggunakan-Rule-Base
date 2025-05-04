<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>BISA</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('backend/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/css/components.css') }}">
  @yield('addselect')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

        <!-- navbar -->
        @include('backend.partial.navbar')

        <!-- side bar -->
        @include('backend.partial.sidebar')


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            {{-- <h1>Blank Page</h1> --}}
            @yield('tittle-header')
          </div>
          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>

        <!-- footer -->
        @include('backend.partial.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('backend/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/modules/popper.js') }}"></script>
  <script src="{{ asset('backend/modules/tooltip.js') }}"></script>
  <script src="{{ asset('backend/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('backend/modules/moment.min.js') }}"></script>
  <script src="{{ asset('backend/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('backend/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/js/custom.js') }}"></script>
  @yield('addscript')
</body>
</html>