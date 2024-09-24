<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;


class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('view-any',product::class);


        $products=product::paginate(6);
        return view('dashboard.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',product::class);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',product::class);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = product::findOrFail($id);
        $this->authorize('view',$product);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $categories=category::all();
        $product =product::findOrfail($id);

        $this->authorize('update',$product);


        return view('dashboard.products.edit',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        $this->authorize('update',$product);

        $product->update($request->all());
        return redirect()->route('dashboard.products.index')->with('success','product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::findOrFail($id);
        $this->authorize('delete',$product);
    }
}
