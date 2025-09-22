<?php

namespace App\Http\Livewire\Members;

use App\Models\Branch;
use App\Models\Member;
use Livewire\Component;
use Livewire\WithPagination;

class MemberList extends Component
{
    use WithPagination;

    public $search = '';
    public $branch_id = '';
    public $status = '';

    public function render()
    {
        $members = Member::query()
            ->when($this->search, function ($query) {
                $query->where('member_no', 'like', '%' . $this->search . '%')
                    ->orWhere('phone', 'like', '%' . $this->search . '%')
                    ->orWhere('id_number', 'like', '%' . $this->search . '%');
            })
            ->when($this->branch_id, function ($query) {
                $query->where('branch_id', $this->branch_id);
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->paginate(10);

        $branches = Branch::all();

        return view('livewire.members.member-list', [
            'members' => $members,
            'branches' => $branches,
        ]);
    }
}
