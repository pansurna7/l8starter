<div>
    @section('title')
    Detail Wewenang Pengguna
    @endsection
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <a href="{{ route('admin.role') }}" class="btn btn-sm text-muted float-right">
                        <i class="fa fa-list-alt nav-icon"></i> Kembali
                    </a>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <div class="form-group">
                        <label for="input_role_name" class="font-weight-bold">
                           Role name
                        </label>
                        <input id="input_role_name" value="{{ $role->name }}" name="name" type="text" class="form-control" readonly />
                     </div>
                     <!-- permission -->
                     <div class="form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                           permission
                        </label>
                        <div class="row">
                           <!-- list manage name:start -->
                           <ul class="list-group mx-1">
                              <li class="list-group-item bg-dark text-white">
                                 Manage name
                              </li>
                              <!-- list permission:start -->
                              <li class="list-group-item">
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                       value="" onclick="return false;" checked>
                                    <label class="form-check-label">
                                       Role name
                                    </label>
                                 </div>
                              </li>
                              <!-- list permission:end -->
                           </ul>
                           <!-- list manage name:end  -->
                        </div>
                     </div>
                     <!-- button  -->
                     <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.role') }}" class="btn btn-primary mx-1" role="button">
                           Kembali
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
        <!-- /.content -->
    </div>

</div>
