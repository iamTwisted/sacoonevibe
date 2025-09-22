<div class="card">
    <div class="card-header">
        <h4 class="card-title">Beneficiaries</h4>
        <button wire:click="addBeneficiary" class="btn btn-primary">Add Beneficiary</button>
    </div>
    <div class="card-body">
        @foreach ($beneficiaries as $index => $beneficiary)
            <div class="border-t pt-4 mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Beneficiary {{ $index + 1 }}</h5>
                    <button wire:click="removeBeneficiary({{ $index }})" class="btn btn-danger btn-sm">Remove</button>
                </div>
                <div class="basic-form mt-4">
                    <form>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" wire:model="beneficiaries.{{ $index }}.name" id="beneficiary_name_{{ $index }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Relationship</label>
                                    <div class="col-sm-9">
                                        <input type="text" wire:model="beneficiaries.{{ $index }}.relationship" id="beneficiary_relationship_{{ $index }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="text" wire:model="beneficiaries.{{ $index }}.phone" id="beneficiary_phone_{{ $index }}" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">ID Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" wire:model="beneficiaries.{{ $index }}.id_number" id="beneficiary_id_number_{{ $index }}" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Allocation (%)</label>
                            <div class="col-sm-9">
                                <input type="number" wire:model="beneficiaries.{{ $index }}.allocation" id="beneficiary_allocation_{{ $index }}" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
