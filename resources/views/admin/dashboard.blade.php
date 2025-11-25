<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-tachometer-alt mr-2"></i>{{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Bienvenido al Panel de Administración</h3>
                    <p class="text-gray-600 mb-4">Biblioteca Digital</p>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                        <!-- Stats Card 1 -->
                        <div class="bg-blue-50 p-6 rounded-lg border border-blue-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                    <i class="fas fa-users text-white text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Usuarios
                                        </dt>
                                        <dd class="text-lg font-semibold text-gray-900">
                                            {{ \App\Models\User::count() }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Card 2 -->
                        <div class="bg-green-50 p-6 rounded-lg border border-green-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                    <i class="fas fa-user-tag text-white text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Roles
                                        </dt>
                                        <dd class="text-lg font-semibold text-gray-900">
                                            {{ \Spatie\Permission\Models\Role::count() }}
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>

                        <!-- Stats Card 3 -->
                        <div class="bg-purple-50 p-6 rounded-lg border border-purple-200">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                    <i class="fas fa-book text-white text-2xl"></i>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 truncate">
                                            Sistema
                                        </dt>
                                        <dd class="text-lg font-semibold text-gray-900">
                                            Activo
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
