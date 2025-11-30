<?php

use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user?->hasRole(['admin', 'staff'])) {
            return redirect()->route('admin.dashboard');
        }

        $ebooks = \App\Models\Ebook::with('category')
            ->where('is_active', true)
            ->latest()
            ->paginate(8);

        return view('dashboard', compact('ebooks'));
    })->name('dashboard');
});

Route::redirect('/', '/dashboard');
Route::redirect('/admin', '/admin/dashboard');
