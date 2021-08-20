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
                           Nama
                        </label>
                        <input id="input_role_name" value="{{ $role->name }}" name="name" type="text" class="form-control" readonly />
                     </div>
                     <!-- permission -->
                     <div class="form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                           Hak Akses
                        </label>
                        <div class="row">
                           <!-- list manage name:start -->
                           @forelse ($submenus as $submenu)
                           <ul class="list-group mx-1">
                                <li class="list-group-item bg-dark text-white">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="" onclick="return true" checked>
                                        <label class="form-check-label">
                                            {{$submenu->title}}
                                        </label>
                                    </div>
                                </li>
                                <!-- list permission:start -->
                                {{--  @foreach(Spatie\Permission\Models\Hasrole::JoinTablePermission()->where('role_id',$role->id)->where('submenu_id',$submenu->id)->get() as $permission)  --}}
                                @foreach(App\Models\Hasrole::JoinTablePermission()->where('role_id',$role->id)->where('submenu_id',$submenu->id) as $permission)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                            value="" onclick="return false;" checked>
                                        <label class="form-check-label">
                                            {{str_replace("_",' ',$permission->name_indo)}}
                                        </label>
                                        </div>

                                    </li>
                                @endforeach
                                <!-- list permission:end -->
                            </ul>
                           @empty
                            <strong>
                                <p>Hak Aksess Tidak Ditemukan</p>
                            </strong>
                           @endforelse
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
