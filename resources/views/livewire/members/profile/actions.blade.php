<div>
    <div class="flex space-x-4">
        @if ($member->status === 'pending')
            <button wire:click="reactivate({{ $member->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Activate</button>
        @endif
        @if ($member->status === 'active')
            <button wire:click="suspend({{ $member->id }})" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Suspend</button>
        @endif
        @if ($member->status === 'suspended')
            <button wire:click="reactivate({{ $member->id }})" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Reactivate</button>
        @endif
        <button wire:click="terminate({{ $member->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Terminate</button>
    </div>
</div>
