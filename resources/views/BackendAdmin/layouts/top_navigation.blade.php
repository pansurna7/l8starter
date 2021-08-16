<nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>
    <marquee style="color: yellowgreen; font-weight: bold; font-size=40px"> Selamat Datang {{Auth::guard('admin')->user()->name}} To Lexadev   </marquee>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
             <img src="{{asset('asset/Admin/source/dist/img/profile')}}/{{Auth::guard('admin')->user()->image}}" class="user-image img-circle elevation-2" alt="User Image">
            <span class="d-none d-md-inline">{{Auth::guard('admin')->user()->name}}</span>

        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
               <img src="{{asset('asset/Admin/source/dist/img/profile')}}/{{Auth::guard('admin')->user()->image}}" class="user-image img-circle elevation-2" alt="User Image">

                <p>
                   {{Auth::guard('admin')->user()->name}} - {{Auth::guard('admin')->user()->email}}
                   <small>Join {{ \Carbon\Carbon::parse(Auth::guard('admin')->user()->created_at)->format('d/m/Y')}}</small>
                </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
                <a href="{{route('staff.logout')}}" class="btn btn-default btn-flat float-right">Sign out</a>
            </li>
        </ul>
    </li>
    </ul>
  </nav>
