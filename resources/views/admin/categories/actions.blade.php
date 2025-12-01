<div class="flex items-center space-x-2">
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
</div>
