<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;
use App\Models\Submenu;
use Livewire\Component;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class RoleComponent extends Component
{
    public $idr;
    public $slug;
    public $searchTerm;
    public $role_name;
    public $role_name_update;
    public $hakakses=[];
    public $selectedpermissions=[];
    public $selectedrole;
    public $checkall;
    public $RoleIdAkanDihapus=null;
    protected $listeners=['konfirmasiHapus'=>'hapusRole'];
    protected $rules = [
        'role_name'             => 'required|string|max:40|unique:roles,name',
        'hakakses'              => 'required',
    ];
    protected $messages = [
        'role_name.required'            => 'Peran Pengguna Tidak Boleh Kosong',
        'role_name.unique'              => 'Peran Pengguna Sudah Ada',
        'role_name.string'              => 'Peran Pengguna Harus Berupa Huruf',
        'role_name.max'                 => 'Panjang Huruf Maximal 40 Karakter',
        'hakakses.required'             => 'Pilih Menimal Satu Hakakses',
        'selectedpermissions.required'  => 'Pilih Menimal Satu Hakakses',

    ];

    public function restInputFields(){
        $this->idr;
        $this->role_name = '';
        $this->hakakses='';
        $this->resetValidation();
    }

    public function store(){
        $this->validate();
        $role=Role::create([
            'name'=>$this->role_name,
            'guard_name'=> 'admin'
        ]);
        $role->givePermissionTo($this->hakakses);
        $this->emit('roleAdd');
        $this->restInputFields();
        $this->dispatchBrowserEvent('pesanSimpan',['message'=>'Data Peran Pengguna  Berhasil Dibuat']);
    }

    public function edit($id){
        $this->selectedpermissions=[];
        $role=Role::find($id);
        if($role) {
            $this->selectedpermissions =$role->getAllPermissions()
                    ->sortBy('id')
                    ->pluck('id', 'id')
                    ->toArray();
        }
        $this->idr=$role->id;
        $this->role_name_update=$role->name;
    }
    public function Updatedcheckall($id)
        {
            if($id) {
                $this->selectedpermissions = Permission::all()
                    ->pluck('id', 'id')
                    ->toArray();
            }
            else
            {
                $this->selectedpermissions=[];
            }
        }

    public function update(){
        if($this->selectedpermissions){
            // remove unchecked values that comes with false assign it
            $this->selectedpermissions = Arr::where($this->selectedpermissions, function ($value) {
                return $value;
            });
        }
        $role=Role::find($this->idr);
        if ($role) {
            $role->syncPermissions(Permission::find(array_keys($this->selectedpermissions))->pluck('name'));
            $this->selectedpermissions = $role->getAllPermissions()->sortBy('name')
                    ->pluck('id', 'id')
                    ->toArray();
            $this->emit('roleUpdate');
            $this->dispatchBrowserEvent('pesanUpdate',['message'=>'Data Peran Pengguna  Berhasil Diubah']);
        }
    }
    public function konfirmasiHapusRole($id){
        $this->RoleIdAkanDihapus=$id;
        $this->dispatchBrowserEvent('tampil-hapus-konfirmasi');
    }
    public function hapusRole(){
           $role=Role::findOrFail($this->RoleIdAkanDihapus);
           $role->delete();
           $this->dispatchBrowserEvent('pesanHapus',['message'=>'Data Role  Berhasil Dihapus']);
    }

    public function render()
    {
        $sbmenus=Submenu::all();
        $searchTerm='%'.$this->searchTerm . '%';
        $roles=Role::where('name','LIKE',$searchTerm)->get();
        return view('livewire.admin.management-system.role.role-index',['roles'=>$roles,'submenus'=>$sbmenus])->layout('BackendAdmin/layouts/base');
    }

}
