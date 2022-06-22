<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['products'] = Product::paginate(6);
        $data['page_title'] = "Tous les articles";
        // dd($products);

        return view('products.list', $data);
    }

    public function getStatus()
    {      
        $data['products'] = Product::where('status', "1")->paginate(6);
        $data['page_title'] = "Articles en solde";

        return view('products.list', $data);
    }

    public function getCategory($category_slug)
    {

        // die;
        $data['products'] = Product::where('category_id', $category_slug)->paginate(6);
        if($category_slug == 1){
            $data['page_title'] = "Catégorie homme";
        }
        else{
            $data['page_title'] = "Catégorie femme"; 
        }
        // dd($products);

        return view('products.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
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
