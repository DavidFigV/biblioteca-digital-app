<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Role;

class RoleTable extends DataTableComponent
{
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Nombre', 'name')->sortable()->searchable(),
            Column::make('Usuarios')
                ->label(fn (Role $role) => $role->users()->count()),
            Column::make('Acciones')
                ->label(fn (Role $role) => view('admin.roles.actions', ['role' => $role]))
                ->html(),
        ];
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return Role::query()->withCount('users');
    }
}
