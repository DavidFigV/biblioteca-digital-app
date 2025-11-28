<x-admin-layout title="Crear categoría | {{ config('app.name') }}" :breadcrumbs="[['name' => 'Categorías', 'href' => route('admin.categories.index')], ['name' => 'Crear']]">
    <div class="max-w-3xl mx-auto bg-white shadow-sm rounded-lg border border-gray-200 p-6 space-y-4">
        <h1 class="text-xl font-semibold text-gray-900">Nueva categoría</h1>

        <form method="POST" action="{{ route('admin.categories.store') }}" class="space-y-4">
            @csrf
            <div>
                <x-label for="name" value="Nombre" />
                <x-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{ old('name') }}" required />
                <x-input-error for="name" class="mt-2" />
            </div>

            <div>
                <x-label for="description" value="Descripción (opcional)" />
                <textarea id="description" name="description" rows="4" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
                <x-input-error for="description" class="mt-2" />
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50">Cancelar</a>
                <x-button primary type="submit">Guardar</x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
