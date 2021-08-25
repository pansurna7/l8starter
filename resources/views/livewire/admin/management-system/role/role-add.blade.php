<!-- Modal -->
<div class="modal fade" id="roleModalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary justify-content-center">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Peran Pengguna</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                       <div class="card">
                          <form action="" method="POST">
                             <div class="card-body">
                                <div class="form-group">
                                   <label for="input_role_name" class="font-weight-bold">
                                      Peran Pengguna
                                   </label>
                                   <input id="input_role_name" value="" name="name" type="text" class="form-control" wired:model="role_name" />
                                </div>
                                <!-- permission -->
                                <div class="form-group">
                                   <label for="input_role_permission" class="font-weight-bold">
                                      Hak Akses
                                   </label>
                                   <div class="form-control overflow-auto h-100 " id="input_role_permission">
                                      <div class="row">
                                         <!-- list manage name:start -->



                                            <ul class="list-group mx-1" >
                                                <li class="list-group-item bg-dark text-white"  wired:model="submenus">

                                                </li>
                                                <!-- list permission:start -->
                                                <li class="list-group-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
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
                                </div>

                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
            </div>
            <div class="modal-footer col-md-12 justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt"></i>Kembali</button>
                <button type="submit" id="submitForm" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
            </div>
        </div>
    </div>
</div>
