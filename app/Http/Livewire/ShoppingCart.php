<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShoppingCart extends Component
{
    public $cartItems = [];

    protected $listeners = ['cartUpdated' => '$refresh'];

    public function render()
    {
        $this->cartItems = \Cart::getContent()->toArray();
        return view('livewire.shopping-cart');
    }

      public function remove($id)
      {
          \Cart::remove($id);
          $this->emit('cart_updated');
          session()->flash('success', 'Item has removed !');
      }

      public function clear()
      {
          \Cart::clear();
          session()->flash('success', 'All Item Cart Clear Successfully !');
          $this->emit('cart_updated');
      }

}
