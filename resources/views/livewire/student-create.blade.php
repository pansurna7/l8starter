<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="">
           <div class="form-group">
               <label for="name">Role Name</label>
               <input type="text" name="name"  class="form-control" wire:model="name">
               @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-undo-alt"></i> Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="store()"><i class="fa fa-save"></i>Save Data</button>
      </div>
    </div>
  </div>
</div>
