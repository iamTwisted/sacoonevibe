<div>
    <div class="mb-4">
        <div class="flex justify-between items-center">
            <div class="text-lg font-bold">Step {{ $currentStep }} of {{ $totalSteps }}</div>
            <div>
                @if ($currentStep > 1)
                    <button wire:click="previousStep" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Previous</button>
                @endif
                @if ($currentStep < $totalSteps)
                    <button wire:click="nextStep" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
                @else
                    <button wire:click="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                @endif
            </div>
        </div>
    </div>

    @if ($currentStep == 1)
        @include('livewire.members.create.personal-info')
    @elseif ($currentStep == 2)
        @include('livewire.members.create.savings')
    @elseif ($currentStep == 3)
        @include('livewire.members.create.shares')
    @elseif ($currentStep == 4)
        @include('livewire.members.create.beneficiaries')
    @elseif ($currentStep == 5)
        @include('livewire.members.create.review')
    @endif
</div>
