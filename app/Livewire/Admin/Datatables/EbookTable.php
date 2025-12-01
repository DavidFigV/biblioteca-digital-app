<?php

namespace App\Livewire\Admin\Datatables;

use App\Models\Ebook;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class EbookTable extends DataTableComponent
{
    protected $model = Ebook::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setDefaultSort('id', 'desc');
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {
        return Ebook::query()->with('category');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->sortable(),
            Column::make('Título', 'title')->sortable()->searchable(),
            Column::make('Autor', 'author')->sortable()->searchable(),
            Column::make('Categoría')
                ->label(fn (Ebook $ebook) => $ebook->category?->name ?? '-')
                ->sortable(),
            Column::make('Año', 'published_year')->sortable(),
            Column::make('Acciones')
                ->label(fn (Ebook $ebook) => view('admin.ebooks.actions', ['ebook' => $ebook]))
                ->html(),
        ];
    }
}
