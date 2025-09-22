<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="id_type">ID Type</label>
            <input type="text" class="form-control" id="id_type" wire:model="id_type">
            @error('id_type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="id_number">ID Number</label>
            <input type="text" class="form-control" id="id_number" wire:model="id_number">
            @error('id_number') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" wire:model="phone">
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" wire:model="address"></textarea>
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="share_percent">Share Percentage</label>
            <input type="number" class="form-control" id="share_percent" wire:model="share_percent">
            @error('share_percent') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" wire:model="type">
                <option value="">Select Type</option>
                <option value="primary">Primary</option>
                <option value="secondary">Secondary</option>
                <option value="contingent">Contingent</option>
            </select>
            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="is_verified" wire:model="is_verified">
            <label class="form-check-label" for="is_verified">Is Verified</label>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
