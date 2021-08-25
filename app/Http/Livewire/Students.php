<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;


class Students extends Component
{
    public $name;
    public $idr;
    public function restInputFields(){

        $this->name = '';
        $this->resetErrorBag();
        $this->resetValidation();
    }
    protected $rules = [
        'name' => 'required|unique:roles',
    ];
    protected $messages = [
        'name.required' => 'Data tidak boleh kosong',

    ];
    public function alertSuccess()
    {
        $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => 'Role Created Successfully!']);
    }
    public function store(){
        $this->validate();
        Role::create([
            'name' => $this->name,
        ]);
        $this->emit('roleAdd');
        $this->restInputFields();
        $this->alertSuccess();
    }
    public function render()
    {
        $roles=Role::orderBy('id','ASC')->get();
        return view('livewire.students',['roles'=>$roles])->layout('BackendAdmin/layouts/base');
    }
}
