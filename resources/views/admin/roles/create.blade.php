<x-admin-layout title="Crear rol | {{ config('app.name') }}" :breadcrumbs="[['name' => 'Roles', 'href' => route('admin.roles.index')], ['name' => 'Crear']]">
    <div class="max-w-3xl mx-auto bg-white shadow-sm rounded-lg border border-gray-200 p-6 space-y-4">
        <h1 class="text-xl font-semibold text-gray-900">Nuevo rol</h1>

        <form method="POST" action="{{ route('admin.roles.store') }}" class="space-y-4">
            @csrf
            <div>
                <x-label for="name" value="Nombre" />
                <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.roles.index') }}" class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50">Cancelar</a>
                <x-button primary type="submit">Guardar</x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
