<?php

namespace App\Http\Livewire\Admin\ManagementSystem\Role;
use Spatie\Permission\Models\Role;

use Livewire\Component;

class RoleIndex extends Component
{
    public $idr;
    public $name;
    public $slug;
    public $searchTerm;
    // use WithPagination;
    public function render()
    {
        
        $searchTerm='%'.$this->searchTerm . '%';
        $roles=Role::where('name','LIKE',$searchTerm)->get();
        return view('livewire.admin.management-system.role.role-index',['roles'=>$roles])->layout('BackendAdmin/layouts/base');
    }
   
}
