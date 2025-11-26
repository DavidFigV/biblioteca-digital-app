<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:roles,name'],
        ]);

        Role::create([
            'name' => strtolower($validated['name']),
            'guard_name' => 'web',
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol creado correctamente',
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50', 'unique:roles,name,' . $role->id],
        ]);

        $role->update([
            'name' => strtolower($validated['name']),
        ]);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol actualizado',
        ]);

        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Rol eliminado',
        ]);

        return redirect()->route('admin.roles.index');
    }
}
