<!-- Modal -->
<div wire:ignore.self class="modal fade" id="roleModalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary justify-content-center">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Peran Pengguna</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card">
                            <form wire:submit.prevent="store">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="input_role_name" class="font-weight-bold text-danger">
                                            Peran Pengguna*
                                        </label>
                                        <input id="input_role_name" value="{{old('role_name')}}"   type="text" class="form-control @error("role_name") is-invalid @enderror"  wire:model="role_name"  />
                                        @error('role_name') <span class="error text-danger"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                    <!-- permission -->
                                    <div class="form-group">
                                        <label for="input_role_permission" class="font-weight-bold text-danger">
                                            Hak Akses
                                        </label>
                                        <div class="form-control overflow-auto h-100  @error('hakakses') is-invalid @enderror" id="input_role_permission">
                                            <div class="row">
                                                <!-- list manage name:start -->
                                                @foreach ($submenus as $submenu )
                                                    <ul class="list-group mx-1" >
                                                        <li class="list-group-item bg-dark text-white">
                                                            {{$submenu->title}}
                                                        </li>
                                                        <!-- list permission:start -->
                                                        @foreach (App\Models\Hasrole::JoinTablePermission()->where('submenu_id',$submenu->id)  as $permission )
                                                            <li class="list-group-item">
                                                                <div class="form-check">
                                                                    <input id={{$permission->id}} class="form-check-input" type="checkbox"  value="{{ $permission->id }}" wire:model="hakakses.{{$permission->id}}" >
                                                                    <label for={{$permission->id}} class="form-check-label">
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
                                        @error('hakakses') <span class="text-danger"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt"></i>Kembali</button>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                                </div>
                          </form>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
