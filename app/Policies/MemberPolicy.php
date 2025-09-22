<?php

namespace App\Policies;

use App\Models\Member;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('members.view');
    }

    public function view(User $user, Member $member): bool
    {
        return $user->hasPermissionTo('members.view');
    }

    public function create(User $user): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('teller')) {
            return $user->hasPermissionTo('members.create');
        }

        return false;
    }

    public function approve(User $user, Member $member): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        if ($user->hasRole('branch_manager') && $user->hasPermissionTo('members.approve')) {
            return $user->branch_id === $member->branch_id;
        }

        return false;
    }

    public function update(User $user, Member $member): bool
    {
        return $user->hasPermissionTo('members.update');
    }

    public function delete(User $user, Member $member): bool
    {
        return $user->hasRole('admin');
    }

    public function suspend(User $user, Member $member): bool
    {
        return $user->hasPermissionTo('members.suspend') && $member->status === 'active';
    }

    public function reactivate(User $user, Member $member): bool
    {
        return $user->hasPermissionTo('members.reactivate') && $member->status === 'suspended';
    }

    public function terminate(User $user, Member $member): bool
    {
        return $user->hasPermissionTo('members.terminate') && $member->status !== 'terminated';
    }
}
