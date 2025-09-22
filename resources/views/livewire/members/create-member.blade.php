<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit.prevent="submit">
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">

                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <div class="w-1/4">
                                <div class="{{ $step >= 1 ? 'bg-blue-500' : 'bg-gray-300' }} h-1 rounded-full"></div>
                                <p class="text-sm text-center mt-2">Personal Info</p>
                            </div>
                            <div class="w-1/4">
                                <div class="{{ $step >= 2 ? 'bg-blue-500' : 'bg-gray-300' }} h-1 rounded-full"></div>
                                <p class="text-sm text-center mt-2">Shares</p>
                            </div>
                            <div class="w-1/4">
                                <div class="{{ $step >= 3 ? 'bg-blue-500' : 'bg-gray-300' }} h-1 rounded-full"></div>
                                <p class="text-sm text-center mt-2">Savings</p>
                            </div>
                            <div class="w-1/4">
                                <div class="{{ $step >= 4 ? 'bg-blue-500' : 'bg-gray-300' }} h-1 rounded-full"></div>
                                <p class="text-sm text-center mt-2">Beneficiaries</p>
                            </div>
                            <div class="w-1/4">
                                <div class="{{ $step == 5 ? 'bg-blue-500' : 'bg-gray-300' }} h-1 rounded-full"></div>
                                <p class="text-sm text-center mt-2">Review</p>
                            </div>
                        </div>
                    </div>

                    @if ($step === 1)
                        @include('livewire.members.create.personal-info')
                    @elseif ($step === 2)
                        @include('livewire.members.create.shares')
                    @elseif ($step === 3)
                        @include('livewire.members.create.savings')
                    @elseif ($step === 4)
                        @include('livewire.members.create.beneficiaries')
                    @elseif ($step === 5)
                        @include('livewire.members.create.review')
                    @endif

                </div>

                <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
                    @if ($step > 1)
                        <button type="button" wire:click="previousStep" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Previous
                        </button>
                    @endif

                    @if ($step < 5)
                        <button type="button" wire:click="nextStep" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Next
                        </button>
                    @else
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Submit
                        </button>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
