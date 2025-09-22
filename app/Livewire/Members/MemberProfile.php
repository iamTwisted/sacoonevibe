<?php

namespace App\Http\Livewire\Members;

use App\Models\Member;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class MemberProfile extends Component
{
    use AuthorizesRequests;

    public Member $member;
    public $activeTab = 'overview';

    public function mount(Member $member)
    {
        $this->member = $member;
    }

    public function suspend(Member $member)
    {
        $this->authorize('suspend', $member);
        $member->update(['status' => 'suspended']);
    }

    public function reactivate(Member $member)
    {
        $this->authorize('reactivate', $member);
        $member->update(['status' => 'active']);
    }

    public function terminate(Member $member)
    {
        $this->authorize('terminate', $member);
        $member->update(['status' => 'terminated']);
    }

    public function render()
    {
        return view('livewire.members.member-profile');
    }
}
