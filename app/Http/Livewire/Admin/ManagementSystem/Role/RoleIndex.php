<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;
use Spatie\Permission\Models\Role;
use App\Models\Submenu;

use Livewire\Component;

class RoleIndex extends Component
{
    public $idr;
    public $name;
    public $slug;
    public $searchTerm;
    public $role_name;

    public function submenu(){
        $role=Role::where('id',1)->first();
        $this->role_name=$role->name;
        // dd($this->role_name);
    }
    public function render()
    {

        $searchTerm='%'.$this->searchTerm . '%';
        $roles=Role::where('name','LIKE',$searchTerm)->get();
        return view('livewire.admin.management-system.role.role-index',['roles'=>$roles])->layout('BackendAdmin/layouts/base');
    }

}
