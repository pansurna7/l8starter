<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;

use App\Models\Hasrole;
use App\Models\Submenu;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class RoleComponent extends Component
{
    public $idr;
    public $slug;
    public $searchTerm;
    public $role_name;
    public $hakakses=[];
    public $menu_id=[];
    public $selectedpermissions=[];
    public $selectedrole;
    public $checkall;
    protected $rules = [
        'role_name' => 'required|string|max:80|unique:roles,name',
        'hakakses' => 'required',
    ];
    protected $messages = [
        'role_name.required' => 'Peran Pengguna Tidak Boleh Kosong',
        'role_name.unique' => 'Peran Pengguna Sudah Ada',
        'role_name.string' => 'Peran Pengguna Harus Berupa Huruf',
        'role_name.max' => 'Panjang Huruf Maximal 50 Karakter',
        'hakakses.required' => 'Pilih Menimal Satu Hakakses',

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
        // $role=Role::findOrFail($id);
        // $this->hakakses=$hasrole;
        $role=Role::find($id);
            if($role) {
                $this->selectedpermissions =$role->getAllPermissions()
                     ->sortBy('id')
                     ->pluck('id', 'id')
                     ->toArray();
            }
            $this->idr=$role->id;
            $this->role_name=$role->name;


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
        // $this->validate();
        if($this->selectedpermissions)
        {   // remove unchecked values that comes with false assign it
            $this->selectedpermissions = Arr::where($this->selectedpermissions, function ($value) {
                return $value;
            });
        }

        
        $role=Role::find($this->selectedrole);
        if ($role) {
            $role->syncPermissions(Permission::find(array_keys($this->selectedpermissions))->pluck('name_ind'));
            $this->selectedpermissions = $role->getAllPermissions()->sortBy('name_ind')
                ->pluck('id', 'id')
                ->toArray();
                $this->emit('roleUpdate');
                $this->dispatchBrowserEvent('pesanUpdate',['message'=>'Data Peran Pengguna  Berhasil Diubah']);
        }
    }

    public function render()
    {
        // roles2 untuk kebutuhan checked updated
        $roles_update=Role::select('id')->where('id',$this->idr)->first();


        $sbmenus=Submenu::all();
        $searchTerm='%'.$this->searchTerm . '%';
        $roles=Role::where('name','LIKE',$searchTerm)->get();


        return view('livewire.admin.management-system.role.role-index',['roles'=>$roles,'submenus'=>$sbmenus,'roles_update'=>$roles_update])->layout('BackendAdmin/layouts/base');
    }

}
