<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;
use Spatie\Permission\Models\Role;

use Livewire\Component;

class RoleDetail extends Component
{
    public $idr;
    public function mount($idr){
        $this->idr=$idr;
    }
    public function render()
    {
        $role=Role::where('id',$this->idr)->first();
        return view('livewire.admin.management-system.role.role-detail',['role'=>$role])->layout('BackendAdmin/layouts/base');       
    }
}
