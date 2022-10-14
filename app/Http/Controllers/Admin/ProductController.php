<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Enums\ProductStatus;

use Illuminate\Http\FileHelpers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProduct;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $brands = \App\Models\Brand::pluck('name', 'id');
        $status = ProductStatus::asArray();
        return view('admin.products.create', ['categories'=>$categories, 'brands'=>$brands, 'status'=>$status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request);

        $validated = $request->validate([
            'name' => 'required|min:3',
            'details' => 'required|max:255'
        ]);

        $file = $request->file('cover');
        $caver = '';
        if($request->hasFile('cover'))
            $cover = $request->file('cover')->storeAs('images', $file->hashName(), 'public');

        $product = new Product([
            'name' => $request->name,
            'details' => $request->details,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'cover' => $cover,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);
        $product->save();

        return redirect()->route('admin.products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = \App\Models\Category::pluck('name', 'id');
        $brands = \App\Models\Brand::pluck('name', 'id');
        $status = ProductStatus::asArray();
        $selected_tags = $product->tags()->pluck('id')->toArray();
        $tags = \App\Models\Tag::pluck('name', 'id');

        return view('admin.products.edit', ['categories'=>$categories, 'brands'=>$brands, 'status'=>$status, 'product'=>$product, 'tags'=>$tags, 'selected_tags'=>$selected_tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProduct $request, Product $product)
    {
        // dd($request);
        // dd($request->tags);

        foreach ($request->file('pictures') as $picture){
            $img = new \App\Models\Picture;
            $path = $picture->storeAs('images', $picture->hashName(), 'public');
            $img->url = $path;
            $img->product_id = $product->id;
            $img->save();
        }

        dd($img);

        $file = $request->file('cover');
        // $caver = '';
        if ($request->hasFile('cover')) {
            $img_path = storage_path("app/public/".$product->cover);
            if (Storage::disk('public')->exists($product->cover)) {
                // dd($img_path);
                unlink($img_path);
            }
            $cover = $request->file('cover')->storeAs('images', $file->hashName(), 'public');
        }else{
            $cover = $product->cover;
        }

        $product->update([
            'name' => $request->name,
            'details' => $request->details,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'cover' => $cover,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
        ]);

        if ($request->tags){
            $tags = explode(',', $request->tags);
            $product->tags()->sync($tags);
        }else{
            $product->tags()->detach();
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
