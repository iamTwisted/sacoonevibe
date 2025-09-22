<div>
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-6 sm:col-span-2">
            <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
            <input type="text" wire:model.defer="first_name" id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-2">
            <label for="middle_name" class="block text-sm font-medium text-gray-700">Middle Name</label>
            <input type="text" wire:model.defer="middle_name" id="middle_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('middle_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-2">
            <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" wire:model.defer="last_name" id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="dob" class="block text-sm font-medium text-gray-700">Date of Birth</label>
            <input type="date" wire:model.defer="dob" id="dob" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('dob') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
            <select wire:model.defer="gender" id="gender" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            @error('gender') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="id_type" class="block text-sm font-medium text-gray-700">ID Type</label>
            <input type="text" wire:model.defer="id_type" id="id_type" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('id_type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="id_number" class="block text-sm font-medium text-gray-700">ID Number</label>
            <input type="text" wire:model.defer="id_number" id="id_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('id_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="kra_pin" class="block text-sm font-medium text-gray-700">KRA PIN</label>
            <input type="text" wire:model.defer="kra_pin" id="kra_pin" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('kra_pin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="nin" class="block text-sm font-medium text-gray-700">National ID Number (NIN)</label>
            <input type="text" wire:model.defer="nin" id="nin" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('nin') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" wire:model.defer="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
            <input type="text" wire:model.defer="phone" id="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6">
            <label for="physical_address" class="block text-sm font-medium text-gray-700">Physical Address</label>
            <textarea wire:model.defer="physical_address" id="physical_address" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
            @error('physical_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6">
            <label for="postal_address" class="block text-sm font-medium text-gray-700">Postal Address</label>
            <textarea wire:model.defer="postal_address" id="postal_address" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
            @error('postal_address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
            <input type="file" wire:model="photo" id="photo" class="mt-1">
            @error('photo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="col-span-6 sm:col-span-3">
            <label for="signature" class="block text-sm font-medium text-gray-700">Signature</label>
            <input type="file" wire:model="signature" id="signature" class="mt-1">
            @error('signature') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
    </div>
</div>
