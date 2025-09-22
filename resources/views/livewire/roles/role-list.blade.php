<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Roles</h1>
        @can('create-roles')
            <a href="{{ route('roles.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Role</a>
        @endcan
    </div>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td class="border px-4 py-2">{{ $role->name }}</td>
                    <td class="border px-4 py-2">
                        @can('edit-roles')
                            <a href="{{ route('roles.edit', $role) }}" class="text-blue-500 hover:underline">Edit</a>
                        @endcan
                        @can('delete-roles')
                            <button wire:click="delete({{ $role->id }})" class="text-red-500 hover:underline ml-2">Delete</button>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $roles->links() }}
</div>
