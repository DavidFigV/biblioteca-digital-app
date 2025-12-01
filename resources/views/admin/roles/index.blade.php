<x-admin-layout title="Roles | {{ config('app.name') }}" :breadcrumbs="[
    [
      'name' => 'Dashboard',
      'href' => route('admin.dashboard')
    ],
    [
        'name' => 'Roles'
    ]
]">
    <x-slot name="action">
        <a href="{{ route('admin.roles.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition ease-in-out duration-150">
            <i class="fas fa-plus mr-2"></i> Nuevo
        </a>
    </x-slot>

    <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
        <livewire:admin.datatables.role-table />
    </div>
</x-admin-layout>
