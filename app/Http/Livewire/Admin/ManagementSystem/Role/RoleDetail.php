<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;

use App\Models\Hasrole;
use App\Models\Submenu;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Support\Facades\DB;

class RoleDetail extends Component
{
    public $idr;
    public $idm=[];
    public function mount($idr){
        $this->idr=$idr;
    }
    public function render()
    {
        $role=Role::where('id',$this->idr)->first();
        $submenus=Submenu::all();
       
        return view('livewire.admin.management-system.role.role-detail',['role'=>$role,''=>$role,'submenus'=>$submenus])->layout('BackendAdmin/layouts/base');
    }
}
