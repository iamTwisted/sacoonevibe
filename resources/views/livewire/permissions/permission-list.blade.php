<div>
    <h1 class="text-3xl font-bold mb-4">Permissions</h1>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
                <tr>
                    <td class="border px-4 py-2">{{ $permission->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $permissions->links() }}
</div>
