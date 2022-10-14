<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\{Product, Picture};

class ShowProduct extends Component
{
    public $product;
    public $pictures;
    public $current = 0;
    public $quantity;

    public function mount($id) {
        $this->product = Product::with('brand')->with('category')->with('tags')->find($id);
        $this->pictures = Picture::where('product_id', $id)->get();
    }

    public function render()
    {
        if($this->pictures->isEmpty()){
            $this->pictures = collect(new Picture);
            $this->pictures->push(['url'=>$this->product->cover]);
        }
        return view('livewire.show-product');
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);
        \Cart::add([
            'id' => $product->id,
            'name'=>$product->name,
            'price' => $product->price / 100,
            'quantity' => $this->quantity ?? 1,
            'attributes' => [
                'image' => $product->cover,
            ]
            ]);
            $this->emit('cart_updated');
    }
}
