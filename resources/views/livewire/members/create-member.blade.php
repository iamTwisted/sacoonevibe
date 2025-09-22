<x-admin-layout>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create Member</h4>
            <div class="d-flex justify-content-end">
                @if ($currentStep > 1)
                    <button wire:click="previousStep" class="btn btn-secondary mr-2">Previous</button>
                @endif
                @if ($currentStep < $totalSteps)
                    <button wire:click="nextStep" class="btn btn-primary">Next</button>
                @else
                    <button wire:click="submit" class="btn btn-success">Submit</button>
                @endif
            </div>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-lg font-bold">Step {{ $currentStep }} of {{ $totalSteps }}</div>
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
    </div>
</x-admin-layout>
