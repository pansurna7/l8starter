<!-- Modal -->
<div wire:ignore.self class="modal fade" id="userModalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary justify-content-center">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Peran Pengguna</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card">
                          <div class="card-body">
                             <form wire:submit.prevent="store">
                                <!-- name -->
                                <div class="form-group">
                                   <label for="input_user_name" class="font-weight-bold">
                                      <i class="mdi mdi-newspaper-variant-multiple:">Nama</i>
                                   </label>
                                   <input id="input_user_name" value="" name="name" type="text" class="form-control @error("nama") is-invalid @enderror" placeholder="Masukkan Nama" wire:model="nama"/>
                                   @error('nama') <span class="error text-danger"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                                <!-- role -->
                                <div class="form-group">
                                   <label for="select_user_role" class="font-weight-bold">
                                      Peran Pengguna
                                   </label>
                                   <select id="select_user_role" name="role" data-placeholder="" class="custom-select w-100  @error("role") is-invalid @enderror" wire:model="role">
                                    <option value="" selected="selected">Pilih Peran Pengguna</option>
                                    @foreach ($roles as $role )
                                       <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
                                       @endforeach
                                   </select>
                                   @error('role') <span class="error text-danger"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                                <!-- email -->
                                <div class="form-group">
                                   <label for="input_user_email" class="font-weight-bold">
                                      Email
                                   </label>
                                   <input id="input_user_email" value="" name="email" type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Masukkan Email" autocomplete="email" wire:model="email"/>
                                   @error('email') <span class="error text-danger"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                                <!-- password -->
                                <div class="form-group">
                                   <label for="input_user_password" class="font-weight-bold">
                                      Kata Sandi
                                   </label>
                                   <input id="input_user_password" name="password" type="password" class="form-control  @error("password") is-invalid @enderror" placeholder="password"
                                      autocomplete="new-password" wire:model="password"/>
                                      @error('password') <span class="error text-danger"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                                <!-- password_confirmation -->
                                <div class="form-group">
                                   <label for="input_user_password_confirmation" class="font-weight-bold">
                                      Konfirmasi Kata Sandi
                                   </label>
                                   <input id="input_user_password_confirmation" name="password_confirmation" type="password"
                                      class="form-control  @error("confpassword") is-invalid @enderror" placeholder="Konfirmasi Kata Sandi" autocomplete="new-password" wire:model="confpassword"/>
                                      @error('confpassword') <span class="error text-danger"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-warning" data-dismiss="modal"><i class="fas fa-undo-alt"></i>Kembali</button>
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
</div>
