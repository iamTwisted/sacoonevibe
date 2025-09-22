<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            @can('view-users')
            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="text-blue-500 hover:underline">Manage Users</a>
            </div>
            @endcan

            @can('view-roles')
            <div class="mt-4">
                <a href="{{ route('roles.index') }}" class="text-blue-500 hover:underline">Manage Roles</a>
            </div>
            @endcan

            @can('view-permissions')
            <div class="mt-4">
                <a href="{{ route('permissions.index') }}" class="text-blue-500 hover:underline">View Permissions</a>
            </div>
            @endcan
        </div>
    </div>
</x-admin-layout>
