<x-admin-layout title="Editar ebook | {{ config('app.name') }}" :breadcrumbs="[['name' => 'Ebooks', 'href' => route('admin.ebooks.index')], ['name' => 'Editar']]">
    <div class="max-w-4xl mx-auto bg-white shadow-sm rounded-lg border border-gray-200 p-6 space-y-4">
        <h1 class="text-xl font-semibold text-gray-900">Editar ebook</h1>

        <form method="POST" action="{{ route('admin.ebooks.update', $ebook) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <x-label for="title" value="Título" />
                <x-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $ebook->title) }}" required />
                <x-input-error for="title" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="author" value="Autor (opcional)" />
                    <x-input id="author" name="author" type="text" class="mt-1 block w-full" value="{{ old('author', $ebook->author) }}" />
                    <x-input-error for="author" class="mt-2" />
                </div>
                <div>
                    <x-label for="published_year" value="Año" />
                    <x-input id="published_year" name="published_year" type="number" class="mt-1 block w-full" value="{{ old('published_year', $ebook->published_year) }}" />
                    <x-input-error for="published_year" class="mt-2" />
                </div>
            </div>

            <div>
                <x-label for="category_id" value="Categoría" />
                <select name="category_id" id="category_id" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                    <option value="">Seleccione categoría</option>
                    @foreach ($categories as $id => $name)
                        <option value="{{ $id }}" @selected(old('category_id', $ebook->category_id) == $id)>{{ $name }}</option>
                    @endforeach
                </select>
                <x-input-error for="category_id" class="mt-2" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-label for="isbn" value="ISBN (opcional)" />
                    <x-input id="isbn" name="isbn" type="text" class="mt-1 block w-full" value="{{ old('isbn', $ebook->isbn) }}" />
                    <x-input-error for="isbn" class="mt-2" />
                </div>
                <div>
                    <x-label for="format" value="Formato (opcional)" />
                    <x-input id="format" name="format" type="text" class="mt-1 block w-full" value="{{ old('format', $ebook->format) }}" placeholder="PDF, EPUB, MOBI" />
                    <x-input-error for="format" class="mt-2" />
                </div>
            </div>

            <div>
                <x-label for="file_path" value="URL o ruta del archivo (opcional)" />
                <x-input id="file_path" name="file_path" type="text" class="mt-1 block w-full" value="{{ old('file_path', $ebook->file_path) }}" placeholder="https://..." />
                <x-input-error for="file_path" class="mt-2" />
            </div>

            <div>
                <x-label for="synopsis" value="Sinopsis (opcional)" />
                <textarea id="synopsis" name="synopsis" rows="4" class="mt-1 w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('synopsis', $ebook->synopsis) }}</textarea>
                <x-input-error for="synopsis" class="mt-2" />
            </div>

            <div class="flex items-center gap-2">
                <x-checkbox id="is_active" name="is_active" @checked(old('is_active', $ebook->is_active)) />
                <x-label for="is_active" value="Activo" />
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('admin.ebooks.index') }}" class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50">Cancelar</a>
                <x-button primary type="submit">Actualizar</x-button>
            </div>
        </form>
    </div>
</x-admin-layout>
