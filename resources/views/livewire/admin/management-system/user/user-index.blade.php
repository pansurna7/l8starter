<div>
    @section('title')
    Pengguna
    @endsection
    @include('livewire.admin.management-system.user.user-add')
    @include('livewire.admin.management-system.user.user-update')
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
        </div><!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="row">
                <div class="col-md-12">
                   <div class="card">

                        <div class="card-body">
                            <table id="tblUser" class="table table-bordered table-striped">
                                <a  class="btn btn-success float-right" data role="button" data-toggle="modal" data-target="#userModalAdd" wire:click.prevent="resetForm">
                                    Tambah Data
                                    <i class="fas fa-plus-square"></i>
                                </a>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{--  @php($i=1)  --}}
                                        @forelse ($data as $key => $user)
                                            <tr>
                                                <td>{{++$i}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    @if(!empty($user->getRoleNames()))
                                                        @foreach($user->getRoleNames() as $role)
                                                            @if($role==="SuperAdmin")
                                                                <strong><label class="badge badge-danger">{{ $role }}</label></strong>
                                                            @else
                                                            <strong><label class="badge badge-success">{{ $role }}</label></strong>
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                </td>
                                               <td>
                                                <!-- detail -->
                                                <a href="" class="btn btn-sm btn-primary" role="button"><i class="fas fa-eye"></i> </a>
                                                <!-- edit -->
                                                <a class="btn btn-sm btn-info" role="button" wire:click.prevent="edit({{ $user->id }})" data-toggle="modal" data-target="#userModalUpdate"><i class="fas fa-edit"></i></a>
                                                <!-- delete -->
                                                <button class="btn btn-sm btn-danger"  wire:click.prevent="konfirmasiHapusUser({{ $user->id }})"><i class="fas fa-trash"></i></button>
                                               </td>
                                            </tr>
                                        @empty
                                            <p>
                                                <strong>Pengguna Tidak Ada</strong>
                                            </p>
                                        @endforelse

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Peran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                   </div>
                </div>
            </div>
        </div><!-- /.content -->
    </div>
</div>
@push('scripts')
    <script>

        $(document).ready(function() {
            $('#tblUser').DataTable( {
                'responsive':true,
                'autoWidth': true,
                'lengthMenu': [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tblUser_wrapper .col-md-6:eq(0)');
        } );

        window.livewire.on('userAdd',()=>{
            $('#userModalAdd').modal('hide');
        })
        window.livewire.on('userUpdate',()=>{
            $('#userModalUpdate').modal('hide');
        })

    </script>
@endpush
