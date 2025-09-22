<div>
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-3xl font-bold">Users</h1>
        @can('create-users')
            <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create User</a>
        @endcan
    </div>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Roles</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->getRoleNames()->implode(', ') }}</td>
                    <td class="border px-4 py-2">
                        @can('edit-users')
                            <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:underline">Edit</a>
                        @endcan
                        @can('delete-users')
                            <button wire:click="delete({{ $user->id }})" class="text-red-500 hover:underline ml-2">Delete</button>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>
