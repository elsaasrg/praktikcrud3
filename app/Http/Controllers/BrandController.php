<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : Response
    {
        $products = Product::all();

        return response(view('welcome', ['brands' => $brands]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : Response 
    {
        return response(view('brands.create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        if (Product::create($request->validated())) {
            return redirect(route('index'))->with('success','Added!');
            }
        }
     

    /**
     * Display the specified resource. INI BUAT SENDIRI CODE NYA
     */ 
    public function show(string $id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : Response
    {
        $product = Brand::findOrFail($id);
        return response(view('brands.edit', ['brand' => $brand]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
    $product = Brands::findOrFail($id);
    if ($product->update($request->validated())) {
        return redirect(route('index'))->with('success', 'Updated!');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        $product = Product::findOrFail($id);

        if ($product->delete()) {
            return redirect(route('brands.index'))->with('success', 'Delete!');

        }

        return redirect(route('brands.index'))->with('error', 'Sorry, unable to delete this!');
    }

}