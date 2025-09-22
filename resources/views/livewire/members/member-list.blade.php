<div>
    <div class="row">
        <div class="col-md-3">
            <input wire:model.live="search" type="text" class="form-control" placeholder="Search by member no, phone, or ID number">
        </div>
        <div class="col-md-3">
            <select wire:model.live="branch_id" class="form-control">
                <option value="">All Branches</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select wire:model.live="status" class="form-control">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
                <option value="terminated">Terminated</option>
            </select>
        </div>
    </div>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Member No.</th>
                <th>Name</th>
                <th>Branch</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->member_no }}</td>
                    <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                    <td>{{ $member->branch->name }}</td>
                    <td>{{ $member->status }}</td>
                    <td>
                        <a href="{{ route('members.profile', $member) }}" class="btn btn-sm btn-primary">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
</div>
