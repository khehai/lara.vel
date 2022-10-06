<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\{Product, Picture};

class UploadPictures extends Component
{
    use WithFileUploads;

    public $pictures = [];

    public $product;

    public function mount($id) {
        $this->product = Product::find($id);
    }

    public function save() {
        $this->validate([
            'pictures.*' => 'image|max:2048'
        ]);

        foreach ($this->pictures as $picture) {
            $image = new Picture;
            $image->product_id = $this->product->id;
            $path = $picture->store('pictures', 'public');
            $image->url = $path;
            $image->save();
        }
        return redirect()->route('admin.products.index')->with('success', 'Pictures uploaded successfully!');
    }

    public function render()
    {
        return view('livewire.upload-pictures');
    }
}
