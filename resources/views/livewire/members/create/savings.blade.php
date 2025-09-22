<div class="card">
    <div class="card-header">
        <h4 class="card-title">Savings Information</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Monthly Contribution</label>
                            <div class="col-sm-9">
                                <input type="number" wire:model="monthly_contribution" id="monthly_contribution" class="form-control">
                                @error('monthly_contribution') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Retirement Age</label>
                            <div class="col-sm-9">
                                <input type="number" wire:model="retirement_age" id="retirement_age" class="form-control">
                                @error('retirement_age') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
