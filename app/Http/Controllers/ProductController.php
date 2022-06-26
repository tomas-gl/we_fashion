<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['products'] = Product::orderBy('created_at', 'DESC')->paginate(6)->onEachSide(0);
        $data['products_count'] = Product::get()->count();
        $data['page_title'] = "Tous les articles";
        // dd($products);

        return view('products.list', $data);
    }

    public function getProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['sizes'] = Size::get();
        // dd($data['product']);

        $data['availableSizes'] = [];
        foreach ($data['product']->sizes as $value){
            $data['availableSizes'][] = $value->name;
        }

        return view('products.show', $data);
    }

    public function getSolde($status)
    {      
        // dd("test");
        $data['products'] = Product::where('discount', $status)->orderBy('created_at', 'DESC')->paginate(6)->onEachSide(0);
        $data['products_count'] = Product::where('discount', $status)->get()->count();
        $data['page_title'] = "Articles en soldes";

        return view('products.list', $data);
    }

    public function getCategory($category_slug)
    {

        $data['products'] = Product::where('category_id', $category_slug)->orderBy('created_at', 'DESC')->paginate(6)->onEachSide(0);
        $data['products_count'] = Product::where('category_id', $category_slug)->get()->count();
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
