<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Category;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoryTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Nombre', 'name')->sortable()->searchable(),
            Column::make('Descripción', 'description')->searchable(),
            Column::make('Acciones')
                ->label(fn (Category $category) => view('admin.categories.actions', ['category' => $category]))
                ->html(),
        ];
    }
}
