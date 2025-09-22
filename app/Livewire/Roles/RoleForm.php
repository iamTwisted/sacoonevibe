<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleForm extends Component
{
    public Role $role;
    public $permissions;
    public $selectedPermissions = [];

    protected $rules = [
        'role.name' => 'required',
    ];

    public function mount(Role $role)
    {
        $this->role = $role;
        $this->permissions = Permission::all();
        $this->selectedPermissions = $this->role->permissions->pluck('id')->toArray();
    }

    public function save()
    {
        $this->validate();

        $this->role->save();

        $this->role->syncPermissions($this->selectedPermissions);

        return redirect()->to('/roles');
    }

    public function render()
    {
        return view('livewire.roles.role-form');
    }
}
