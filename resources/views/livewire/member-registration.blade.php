<div>
    <div class="w-full bg-gray-200 rounded-full">
        <div class="w-1/5 bg-blue-600 text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width: {{ ($step / 5) * 100 }}%"> {{ $step }}/5 </div>
    </div>

    <div class="mt-4">
        @if ($step == 1)
            @include('livewire.member-registration.personal-details')
        @elseif ($step == 2)
            @include('livewire.member-registration.contact-information')
        @elseif ($step == 3)
            @include('livewire.member-registration.next-of-kin')
        @elseif ($step == 4)
            @include('livewire.member-registration.nominee')
        @elseif ($step == 5)
            @include('livewire.member-registration.payment')
        @endif
    </div>

    <div class="mt-4 flex justify-between">
        @if ($step > 1)
            <button class="btn btn-secondary" wire:click="previousStep">Previous</button>
        @endif

        @if ($step < 5)
            <button class="btn btn-primary" wire:click="nextStep">Next</button>
        @else
            <button class="btn btn-success" wire:click="submit">Submit</button>
        @endif
    </div>
</div>
