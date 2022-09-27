<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $brands = \DB::table('brands')->get();
        // $brands = [];
        return view('admin.brands.index', [
            'title'=>"brands List",
            'brands'=>$brands,
            'html'=>"<strong style='color:red;'>Opps its HTML code</strong>"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create', ['title'=>"Create brand"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $errors = [];
        $status = $request->status ? 1 : 0;
if (isset($request->name) and isset($request->description)) {
    \DB::table('brands')->insert(
        [
            'name' => $request->name,
            'description' => $request->description
        ]
    );
    return redirect('/admin/brands');
    }else{
        if(!isset($request->name))
            $errors['name'] = "Name is required!";
        if(!isset($request->description))
            $errors['description'] = "Description is required!";

        return back()
            ->withInput()
            ->withErrors($errors);
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = \DB::table('brands')->find($id);
        return view('admin.brands.edit', ['title'=>"Edit brand", 'brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $errors = [];
        // $status = $request->status ? 1 : 0;
        if (isset($request->name) and isset($request->description)) {
            \DB::table('brands')
            ->where('id', $id)
            ->update(
            [
            'name' => $request->name,
            'description' => $request->description
            ]
        );
        return redirect('/admin/brands');
        }else{
            if(!isset($request->name))
                $errors['name'] = "Name is required!";
            if(!isset($request->description))
                $errors['description'] = "Description is required!";

            return back()
                ->withInput()
                ->withErrors($errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('brands')
            ->where('id', $id)
            ->delete();
        return redirect('/admin/brands');
    }
}
