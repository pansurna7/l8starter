<div>
    @section('title')
    Wewenang Pengguna
    @endsection
    @include('livewire.admin.management-system.role.role-add')
    @include('livewire.admin.management-system.role.role-update')
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
                                    <a  class="btn btn-success float-right" data role="button" data-toggle="modal" data-target="#roleModalAdd" wire:click.prevent="restInputFields()">
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
                                        <label class="mt-auto mb-auto">{{ $role->name }}</label>
                                        <div>
                                            <!-- detail -->
                                            <a href="{{ route('admin.role.detail',['idr'=>$role->id]) }}" class="btn btn-sm btn-primary" role="button"><i class="fas fa-eye"></i> </a>
                                            <!-- edit -->
                                            <a class="btn btn-sm btn-info" role="button" wire:click.prevent="edit({{$role->id}})" data-toggle="modal" data-target="#roleModalUpdate"><i class="fas fa-edit"></i></a>
                                            <!-- delete -->
                                            <button class="btn btn-sm btn-danger"  wire:click.prevent="konfirmasiHapusRole({{ $role->id }})"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </li>
                                @empty
                                    <p>
                                        <strong>
                                            Wewenang  Pengguna Belum Ada
                                        </strong>
                                    </p>
                                @endforelse<!-- /.list role -->
                            </ul>
                        </div>
                   </div>
                </div>
            </div>
        </div><!-- /.content -->
    </div>
</div>
@push('scripts')
    <script>
        window.livewire.on('roleAdd',()=>{
            $('#roleModalAdd').modal('hide');
        })
        window.livewire.on('roleUpdate',()=>{
            $('#roleModalUpdate').modal('hide');
        })
    </script>
@endpush
