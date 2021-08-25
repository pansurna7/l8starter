<div>
    @section('title')
    Wewenang Pengguna
    @endsection
    @include('livewire.student-create')
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
                <li class="breadcrumb-item"><a href="{{ route('staff.dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">
                      <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                               <form action="" method="GET">
                                  <div class="input-group">
                                     <input name="keyword" type="search" class="form-control" placeholder="Pencarian untuk Wewenang pengguna" wire:model="searchTerm">
                                     <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                           <i class="fas fa-search"></i>
                                        </button>
                                     </div>
                                  </div>
                               </form>
                            </div>
                            <div class="col-md-6">
                               <a  class="btn btn-success float-right" data role="button" wire:click.prevent="restInputFields()" data-toggle="modal" data-target="#addStudentModal">
                                  Tambah Data
                                  <i class="fas fa-plus-square"></i>
                               </a>
                            </div>
                         </div>
                      </div>
                      <div class="card-body">
                         <ul class="list-group list-group-flush">
                            <!-- list role -->
                           @forelse($roles as $role )
                                <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center pr-0">
                                 <label class="mt-auto mb-auto">
                                 <!-- Role name -->
                                 {{ $role->name }}
                                 </label>
                                    <div>
                                       <!-- detail -->
                                       <a href="{{ route('admin.role.detail',['idr'=>$role->id]) }}" class="btn btn-sm btn-primary"
                                       role="button">
                                       <i class="fas fa-eye"></i>
                                       </a>
                                       <!-- edit -->
                                       <a class="btn btn-sm btn-info" role="button">
                                          <i class="fas fa-edit"></i>
                                       </a>
                                       <!-- delete -->
                                       <form class="d-inline" action="" method="POST">
                                          <button type="submit" class="btn btn-sm btn-danger">
                                             <i class="fas fa-trash"></i>
                                          </button>
                                       </form>
                                    </div>
                              </li>
                              @empty
                              <p>
                                 <strong>
                                    Wewenang  Pengguna Belum Ada
                                 </strong>
                              </p>
                           @endforelse
                           <!-- list role -->
                         </ul>
                      </div>
                   </div>
                </div>
             </div>
        </div>
        <!-- /.content -->
    </div>


</div>

@push('scripts')
    <script>
        window.livewire.on('roleAdd',()=>{
            $('#addStudentModal').modal('hide');
        })
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
            event.detail.title ?? ''), toastr.options = {
                   "closeButton": true,
                   "progressBar": true,
               }
           });
    </script>

    @endpush
