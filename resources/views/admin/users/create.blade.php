<x-admin-layout title="Crear usuario | {{ config('app.name') }}" :breadcrumbs="[['name' => 'Usuarios', 'href' => route('admin.users.index')], ['name' => 'Crear']]">
    <div class="max-w-4xl mx-auto bg-white shadow-sm rounded-lg border border-gray-200 p-6 space-y-4">
        <h1 class="text-xl font-semibold text-gray-900">Nuevo usuario</h1>

        <form method="POST" action="{{ route('admin.users.store') }}" class="space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="name" value="Nombre" />
                    <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required />
                    <x-input-error for="name" class="mt-2" />
                </div>
                <div>
                    <x-label for="email" value="Email" />
                    <x-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{ old('email') }}" required />
                    <x-input-error for="email" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="member_number" value="Número de miembro (opcional)" />
                    <x-input id="member_number" name="member_number" type="text" class="mt-1 block w-full" value="{{ old('member_number') }}" />
                    <x-input-error for="member_number" class="mt-2" />
                </div>
                <div class="flex items-center gap-2 mt-6">
                    <x-checkbox id="is_active" name="is_active" checked />
                    <x-label for="is_active" value="Activo" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="phone" value="Teléfono (opcional)" />
                    <x-input id="phone" name="phone" type="text" class="mt-1 block w-full" value="{{ old('phone') }}" />
                    <x-input-error for="phone" class="mt-2" />
                </div>
                <div>
                    <x-label for="address" value="Dirección (opcional)" />
                    <x-input id="address" name="address" type="text" class="mt-1 block w-full" value="{{ old('address') }}" />
                    <x-input-error for="address" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="password" value="Contraseña" />
                    <x-input id="password" name="password" type="password" class="mt-1 block w-full" required />
                    <x-input-error for="password" class="mt-2" />
                </div>
                <div>
                    <x-label for="password_confirmation" value="Confirmar contraseña" />
                    <x-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" required />
                </div>
            </div>

            <div>
                <x-label for="role" value="Rol" />
                <select name="role" id="role" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Seleccione rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" @selected(old('role') === $role)>{{ ucfirst($role) }}</option>
                    @endforeach
                </select>
                <x-input-error for="role" class="mt-2" />
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50">Cancelar</a>
                <x-button primary type="submit">Guardar</x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
