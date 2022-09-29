<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;

class UsersTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->filterable(),
            Column::name('name')->filterable()->searchable(),
            Column::name('email')->filterable()->searchable(),
            DateColumn::name('created_at')->filterable(),

        ];
    }
}
