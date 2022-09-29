<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BrandsTable extends LivewireDatatable
{
    public $model = Brand::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->filterable(),
            Column::name('name')->filterable()->searchable(),
            DateColumn::name('created_at')->filterable(),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('admin.brands.table-actions', ['id' => $id, 'name' => $name]);
            })->unsortable()

        ];
    }
}
