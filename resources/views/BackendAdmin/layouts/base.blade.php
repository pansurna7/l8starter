
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lexadev | Blank Page</title>
  @include('BackendAdmin.layouts._asset_header')
  @livewireStyles
</head>
    <body class="hold-transition sidebar-mini">

        <div class="wrapper">
            <!-- Navbar -->
            @include('BackendAdmin.layouts.top_navigation')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('BackendAdmin.layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            @yield('content')
            <!-- /.content-wrapper -->

            {{-- footer --}}
            @include('BackendAdmin.layouts.footer')

            <!-- ./wrapper -->
        </div>
        @include('BackendAdmin.layouts._asset_footer')
    </body>
</html>
