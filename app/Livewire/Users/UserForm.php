<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserForm extends Component
{
    public User $user;
    public $roles;
    public $selectedRoles = [];

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required|email',
    ];

    public function mount(User $user)
    {
        $this->user = $user;
        $this->roles = Role::all();
        $this->selectedRoles = $this->user->roles->pluck('id')->toArray();
    }

    public function save()
    {
        $this->validate();

        $this->user->save();

        $this->user->syncRoles($this->selectedRoles);

        return redirect()->to('/users');
    }

    public function render()
    {
        return view('livewire.users.user-form');
    }
}
