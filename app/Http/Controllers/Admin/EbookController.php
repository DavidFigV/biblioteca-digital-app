<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ebook;
use Illuminate\Http\Request;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::with('category')->latest()->paginate(10);
        return view('admin.ebooks.index', compact('ebooks'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        return view('admin.ebooks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['nullable', 'string', 'max:150'],
            'synopsis' => ['nullable', 'string'],
            'isbn' => ['nullable', 'string', 'max:50'],
            'format' => ['nullable', 'string', 'max:50'],
            'file_path' => ['nullable', 'string', 'max:255'],
            'published_year' => ['nullable', 'integer', 'between:1900,2100'],
            'is_active' => ['sometimes', 'boolean'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Ebook::create($validated + ['is_active' => $request->boolean('is_active', true)]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Ebook creado',
        ]);

        return redirect()->route('admin.ebooks.index');
    }

    public function edit(Ebook $ebook)
    {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        return view('admin.ebooks.edit', compact('ebook', 'categories'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'author' => ['nullable', 'string', 'max:150'],
            'synopsis' => ['nullable', 'string'],
            'isbn' => ['nullable', 'string', 'max:50'],
            'format' => ['nullable', 'string', 'max:50'],
            'file_path' => ['nullable', 'string', 'max:255'],
            'published_year' => ['nullable', 'integer', 'between:1900,2100'],
            'is_active' => ['sometimes', 'boolean'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $ebook->update($validated + ['is_active' => $request->boolean('is_active', true)]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Ebook actualizado',
        ]);

        return redirect()->route('admin.ebooks.index');
    }

    public function destroy(Ebook $ebook)
    {
        $ebook->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Ebook eliminado',
        ]);

        return redirect()->route('admin.ebooks.index');
    }
}
