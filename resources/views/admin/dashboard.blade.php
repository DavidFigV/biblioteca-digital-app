<x-admin-layout title="Dashboard | {{ config('app.name') }}" :breadcrumbs="[['name' => 'Dashboard']]">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-5">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-blue-100 text-blue-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Usuarios</p>
                    <p class="text-xl font-semibold text-gray-900">{{ \App\Models\User::count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-5">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-green-100 text-green-600">
                    <i class="fas fa-user-shield text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Roles</p>
                    <p class="text-xl font-semibold text-gray-900">{{ \Spatie\Permission\Models\Role::count() }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-5">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-purple-100 text-purple-600">
                    <i class="fas fa-folder-tree text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Categorías</p>
                    <p class="text-xl font-semibold text-gray-900">—</p>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-5">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-indigo-100 text-indigo-600">
                    <i class="fas fa-book text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Ebooks</p>
                    <p class="text-xl font-semibold text-gray-900">—</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
