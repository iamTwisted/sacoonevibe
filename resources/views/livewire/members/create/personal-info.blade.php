<div class="card">
    <div class="card-header">
        <h4 class="card-title">Personal Information</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Branch</label>
                            <div class="col-sm-9">
                                <select wire:model="branch_id" id="branch_id" class="form-control">
                                    <option value="">Select Branch</option>
                                    @foreach ($branches as $branch)
                                        <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                                @error('branch_id') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Member Type</label>
                            <div class="col-sm-9">
                                <select wire:model="member_type" id="member_type" class="form-control">
                                    <option value="">Select Member Type</option>
                                    <option value="individual">Individual</option>
                                    <option value="group">Group</option>
                                </select>
                                @error('member_type') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-9">
                                <input type="text" wire:model="name" id="name" class="form-control">
                                @error('name') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID Number</label>
                            <div class="col-sm-9">
                                <input type="text" wire:model="id_number" id="id_number" class="form-control">
                                @error('id_number') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" wire:model="phone" id="phone" class="form-control">
                                @error('phone') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" wire:model="email" id="email" class="form-control">
                                @error('email') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                            <div class="col-sm-9">
                                <input type="date" wire:model="dob" id="dob" class="form-control">
                                @error('dob') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select wire:model="gender" id="gender" class="form-control">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender') <span class="text-danger mt-1 d-block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postal Address</label>
                            <div class="col-sm-9">
                                <input type="text" wire:model="postal_address" id="postal_address" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postal Code</label>
                            <div class="col-sm-9">
                                <input type="text" wire:model="postal_code" id="postal_code" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Town</label>
                            <div class="col-sm-9">
                                <input type="text" wire:model="town" id="town" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Country</label>
                            <div class="col-sm-9">
                                <input type="text" wire:model="country" id="country" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
