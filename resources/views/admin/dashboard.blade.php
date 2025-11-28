@php
    $usersCount = \App\Models\User::count();
    $rolesCount = \Spatie\Permission\Models\Role::count();
    $categoriesCount = \App\Models\Category::count();
    $ebooksCount = \App\Models\Ebook::count();
    $recentEbooks = \App\Models\Ebook::with('category')->latest()->take(5)->get();
    $recentUsers = \App\Models\User::latest()->take(5)->get();
@endphp

<x-admin-layout title="Dashboard | {{ config('app.name') }}" :breadcrumbs="[['name' => 'Dashboard']]">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-5">
            <div class="flex items-center">
                <div class="p-3 rounded-md bg-blue-100 text-blue-600">
                    <i class="fas fa-users text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm text-gray-500">Usuarios</p>
                    <p class="text-xl font-semibold text-gray-900">{{ $usersCount }}</p>
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
                    <p class="text-xl font-semibold text-gray-900">{{ $rolesCount }}</p>
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
                    <p class="text-xl font-semibold text-gray-900">{{ $categoriesCount }}</p>
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
                    <p class="text-xl font-semibold text-gray-900">{{ $ebooksCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Ebooks recientes</h2>
                <a href="{{ route('admin.ebooks.index') }}" class="text-sm text-blue-600 hover:text-blue-500">Ver todos</a>
            </div>
            <div class="space-y-3">
                @forelse ($recentEbooks as $ebook)
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $ebook->title }}</p>
                            <p class="text-xs text-gray-500">{{ $ebook->author ?? 'Autor desconocido' }} • {{ $ebook->category?->name ?? 'Sin categoría' }}</p>
                        </div>
                        <a href="{{ route('admin.ebooks.edit', $ebook) }}" class="text-sm text-blue-600 hover:text-blue-500">Editar</a>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">No hay ebooks registrados.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-900">Usuarios recientes</h2>
                <a href="{{ route('admin.users.index') }}" class="text-sm text-blue-600 hover:text-blue-500">Ver todos</a>
            </div>
            <div class="space-y-3">
                @forelse ($recentUsers as $user)
                    <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                        <div>
                            <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                            <p class="text-xs text-gray-500">{{ $user->email }}</p>
                        </div>
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-sm text-blue-600 hover:text-blue-500">Editar</a>
                    </div>
                @empty
                    <p class="text-sm text-gray-500">No hay usuarios registrados.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-admin-layout>
