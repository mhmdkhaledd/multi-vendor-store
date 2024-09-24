<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class  ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index','show');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->all();
        return product::filter($request->query())->paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
