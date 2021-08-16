
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lexadev | Log in</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('asset/Admin/source/dist')}}/plugin/fontawesome-free/css/all.css">

        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{asset('asset/Admin/source/dist')}}/css/adminlte.css">
    </head>
    <body class="hold-transition login-page">
        {{-- message --}}
        @if (Session::has('error'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{Session::get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        {{-- end message --}}
        <div class="login-box">
            <div class="login-logo">
                {{--  <a href="{{ url('/login') }}"><b>Lexadev</b></a>  --}}
                <img src="{{ asset('asset/Admin/source/dist/img/lexa_logo.jpeg') }}" alt="lexadev logo" class="brand-image img-circle elevation-3" style="opacity: .8" width="150px">
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Welcome</p>
                    <form action="{{route('auth.check')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="juan@gmail.com">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password"   id="password" name="password" class="form-control" placeholder="....">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock" id="eye"></span>
                                    {{-- <span  class="fa fa-eye" id="eye"></span> --}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
        <!-- jQuery -->
        <script type="text/javascript" src="{{asset('asset/Admin/source/dist/plugin')}}/jquery/jquery.min.js"></script>

        <!-- Bootstrap 4 -->
        <script src="{{asset('asset/Admin/source/dist/plugin')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('asset/Admin/source/dist/js')}}/adminlte.js"></script>
        <script>
            $( "#password" ).keyup(function() {
             var pass= jQuery.trim($("#password").val());
             if ((pass.length == 0))
                 {
                     $("#eye").attr('class', 'fas fa-lock');
                 }
                 else
                 {
                     $("#eye").attr('class', 'fa fa-eye-slash');
                 }

             });
             $(function () {
             $("#eye").click(function () {
                 $(this).toggleClass("fa-eye-slash fa-eye");
                var type = $(this).hasClass("fa-eye-slash") ? "password" : "text";
                 $("#password").attr("type", type);
             });

         });
         </script>

    </body>
</html>
