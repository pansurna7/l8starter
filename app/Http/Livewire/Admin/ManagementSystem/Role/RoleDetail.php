<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;
use App\Models\Submenu;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Hasrole;
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
        $submenus=DB::table('submenu')->select('id','title')->get();
        // $permissions=DB::table('role_has_permissions as  a')
        //             ->join('permissions as b','a.permission_id','=','b.id')
        //             ->join('submenu as c','b.submenu_id','=','c.id')
        //             ->where('a.role_id',1)
        //             ->select('name_indo')
        //             ->get();
        $a=Hasrole::JoinTablePermission()->where('role_id',1)->where('submenu_id',1);
                    // dd($a);
        // $permissions=HasRoles::where('id',$role->id);
        return view('livewire.admin.management-system.role.role-detail',['role'=>$role,'submenus'=>$submenus])->layout('BackendAdmin/layouts/base');
    }
}
