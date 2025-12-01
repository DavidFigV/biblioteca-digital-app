<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return User::query()->with('roles');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Nombre', 'name')->sortable()->searchable(),
            Column::make('Email', 'email')->sortable()->searchable(),
            Column::make('Número de miembro', 'member_number')->sortable()->searchable(),
            Column::make('Rol')
                ->label(fn (User $user) => $user->roles->pluck('name')->implode(', ') ?: '-'),
            Column::make('Estado')
                ->label(fn (User $user) => $user->is_active ? 'Activo' : 'Inactivo'),
            Column::make('Acciones')
                ->label(fn (User $user) => view('admin.users.actions', ['user' => $user]))
                ->html(),
        ];
    }
}
