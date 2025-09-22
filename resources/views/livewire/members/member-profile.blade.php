<div>
    <div class="sm:hidden">
        <label for="tabs" class="sr-only">Select a tab</label>
        <select id="tabs" name="tabs" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
            <option wire:click="$set('activeTab', 'overview')" :selected="$wire.activeTab === 'overview'">Overview</option>
            <option wire:click="$set('activeTab', 'savings')" :selected="$wire.activeTab === 'savings'">Savings</option>
            <option wire:click="$set('activeTab', 'shares')" :selected="$wire.activeTab === 'shares'">Shares</option>
            <option wire:click="$set('activeTab', 'beneficiaries')" :selected="$wire.activeTab === 'beneficiaries'">Beneficiaries</option>
            <option wire:click="$set('activeTab', 'actions')" :selected="$wire.activeTab === 'actions'">Actions</option>
        </select>
    </div>
    <div class="hidden sm:block">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button wire:click="$set('activeTab', 'overview')" class="{{ $activeTab === 'overview' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Overview
                </button>
                <button wire:click="$set('activeTab', 'savings')" class="{{ $activeTab === 'savings' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Savings
                </button>
                <button wire:click="$set('activeTab', 'shares')" class="{{ $activeTab === 'shares' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Shares
                </button>
                <button wire:click="$set('activeTab', 'beneficiaries')" class="{{ $activeTab === 'beneficiaries' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Beneficiaries
                </button>
                <button wire:click="$set('activeTab', 'actions')" class="{{ $activeTab === 'actions' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm">
                    Actions
                </button>
            </nav>
        </div>
    </div>

    <div class="mt-8">
        @if ($activeTab === 'overview')
            @include('livewire.members.profile.overview')
        @elseif ($activeTab === 'savings')
            @include('livewire.members.profile.savings')
        @elseif ($activeTab === 'shares')
            @include('livewire.members.profile.shares')
        @elseif ($activeTab === 'beneficiaries')
            @include('livewire.members.profile.beneficiaries')
        @elseif ($activeTab === 'actions')
            @include('livewire.members.profile.actions')
        @endif
    </div>
</div>
