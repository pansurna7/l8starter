<?php

namespace App\Http\Livewire\Admin\ManagementSystem;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.management-system.dashboard-component')->layout('BackendAdmin/layouts/base');
    }
}
