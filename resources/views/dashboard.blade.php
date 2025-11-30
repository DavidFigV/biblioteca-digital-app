<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ebooks disponibles') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($ebooks as $ebook)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-sm transition">
                            <h3 class="text-lg font-semibold text-gray-900">{{ $ebook->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $ebook->author ?? 'Autor desconocido' }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $ebook->category?->name ?? 'Sin categoría' }} • {{ $ebook->published_year ?? '-' }}</p>
                            <p class="text-sm text-gray-700 mt-2 line-clamp-3">{{ $ebook->synopsis ?? 'Sin descripción' }}</p>
                        </div>
                    @empty
                        <p class="text-sm text-gray-500">No hay ebooks disponibles.</p>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $ebooks->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
