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
                    <a href="{{ route('admin.role') }}" class="btn btn-primary mx-1" role="button">
                        <i class="fas fa-undo-alt"></i>
                       Kembali
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
                           Peran Pengguna
                        </label>
                        <input id="input_role_name" value="{{ $role->name }}" name="name" type="text" class="form-control" readonly />
                     </div>
                     <!-- permission -->
                     <div class="form-group">
                        <label for="input_role_permission" class="font-weight-bold">
                           Hak Akses*
                        </label>
                        <div class="row">
                           <!-- list manage name:start -->
                            @foreach ($submenus as $submenu )
                            <ul class="list-group mx-1">
                                <li class="list-group-item bg-dark text-white">
                                {{$submenu->title}}
                                </li>
                                <!-- list permission:start -->
                                @foreach (App\Models\Hasrole::JoinTablePermission()->where('submenu_id',$submenu->id)  as $permission )
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input"type="checkbox" value="{{ $permission->id }}" {{ (in_array($permission->id, old('permissions', [])) || isset($role) && $role->permissions->contains($permission->id)) ? "checked" : false }} onclick="return false;">
                                            <label class="form-check-label">
                                                {{$permission->name_ind}}
                                            </label>
                                        </div>
                                    </li>
                                @endforeach
                                <!-- list permission:end -->
                            </ul>

                            @endforeach
                           <!-- list manage name:end  -->
                        </div>
                     </div>
                     <!-- button  -->
                     <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.role') }}" class="btn btn-primary mx-1" role="button">
                            <i class="fas fa-undo-alt"></i>
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
