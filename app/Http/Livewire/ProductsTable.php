<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProductsTable extends LivewireDatatable
{
    public $model = Product::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->filterable(),
            Column::name('name')->filterable()->searchable(),
            Column::name('price')->filterable()->searchable(),
            Column::name('category.name')->filterable()->searchable()->label('Category'),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id', 'slug'], function ($id, $slug) {
                return view('admin.products.table-actions', ['id' => $id, 'slug' => $slug]);
            })->unsortable()

        ];
    }
}
