<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $perPage = 10;

    public function loadMore() {
        $this->perPage += 10;
    }
    public function render()
    {
        $produsts = Product::paginate($this->perPage);
        return view('livewire.product-list', ['products' => $produsts]);
    }
}
