<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.roles.role-list', [
            'roles' => Role::paginate(10),
        ]);
    }
}
