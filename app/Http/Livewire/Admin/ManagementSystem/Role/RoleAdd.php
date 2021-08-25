<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;

use App\Models\Submenu;
use Livewire\Component;

class RoleAdd extends Component
{
    public $role_name;
    public $subs=[];
    public $submenuname;
    public function submenus(){

        $subs=Submenu::where('id',1);
        this->role_name=$subs
    }
    public function mount(){
        //
    }
    public function render()
    {

    //    $submenus=Submenu::where('id',1)->get();
        return view('livewire.admin.management-system.role.role-add');
    }


}
