<x-admin-layout title="Categorías | {{ config('app.name') }}" :breadcrumbs="[['name' => 'Dashboard','href' => route('admin.dashboard')],['name' => 'Categorías']]">
    <x-slot name="action">
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition ease-in-out duration-150">
            <i class="fas fa-plus mr-2"></i> Nueva
        </a>
    </x-slot>

    <div class="bg-white shadow-sm rounded-lg border border-gray-200 p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Nombre</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Descripción</th>
                        <th class="px-4 py-2 text-right text-xs font-semibold text-gray-600 uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $category->name }}</td>
                            <td class="px-4 py-3 text-sm text-gray-700">{{ $category->description ?? '—' }}</td>
                            <td class="px-4 py-3 text-sm text-right space-x-2">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center px-3 py-1 bg-blue-50 text-blue-700 rounded-md text-xs font-semibold hover:bg-blue-100">
                                    <i class="fas fa-pen-to-square mr-1"></i> Editar
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="delete-form inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-50 text-red-700 rounded-md text-xs font-semibold hover:bg-red-100">
                                        <i class="fas fa-trash mr-1"></i> Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-center text-sm text-gray-500">No hay categorías registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
</x-admin-layout>
