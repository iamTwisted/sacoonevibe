<div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'overview' ? 'active' : '' }}" wire:click="$set('activeTab', 'overview')" href="#">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'accounts' ? 'active' : '' }}" wire:click="$set('activeTab', 'accounts')" href="#">Accounts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'shares' ? 'active' : '' }}" wire:click="$set('activeTab', 'shares')" href="#">Shares</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'beneficiaries' ? 'active' : '' }}" wire:click="$set('activeTab', 'beneficiaries')" href="#">Beneficiaries</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'documents' ? 'active' : '' }}" wire:click="$set('activeTab', 'documents')" href="#">Documents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $activeTab === 'history' ? 'active' : '' }}" wire:click="$set('activeTab', 'history')" href="#">History</a>
        </li>
    </ul>

    <div class="tab-content mt-3">
        @include('livewire.members.profile.tabs.' . $activeTab)
    </div>

    <div class="mt-3">
        @can('suspend', $member)
            <button class="btn btn-warning" wire:click="suspend({{ $member->id }})">Suspend</button>
        @endcan
        @can('reactivate', $member)
            <button class="btn btn-success" wire:click="reactivate({{ $member->id }})">Reactivate</button>
        @endcan
        @can('terminate', $member)
            <button class="btn btn-danger" wire:click="terminate({{ $member->id }})">Terminate</button>
        @endcan
    </div>
</div>
