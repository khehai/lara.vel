<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Product, Picture};

class ShowProduct extends Component
{
    public $product;
    public $pictures;

    public function mount($id) {
        $this->product = Product::with('brand')->with('category')->with('tags')->find($id);
        $this->pictures = Picture::where('product_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.show-product', ['product'=>$this->product, 'pictures'=>$this->pictures]);
    }
}
