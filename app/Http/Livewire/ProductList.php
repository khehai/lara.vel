<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class ProductList extends Component
{
    public $perPage = 10;

    public array $quantity = [];

    public function loadMore() {
        $this->perPage += 10;
    }
    public function render()
    {

        $products = Product::paginate($this->perPage);

        foreach ($products as $product){
            $this->quantity[$product->id] = 1;
        }
        return view('livewire.product-list', ['products' => $products]);
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);
        \Cart::add([
            'id' => $product->id,
            'name'=>$product->name,
            'price' => $product->price / 100,
            'quantity' => 1,
            'attributes' => [
            'image' => $product->cover,
            ]
            ]);
            $this->emit('cart_updated');
    }
}
