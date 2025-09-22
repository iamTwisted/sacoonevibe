<?php

namespace App\Livewire\Permissions;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.permissions.permission-list', [
            'permissions' => Permission::paginate(10),
        ]);
    }
}
