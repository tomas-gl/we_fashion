<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;


class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['products'] = Product::orderBy('created_at', 'DESC')->paginate(6)->onEachSide(0);
        $data['products_count'] = Product::get()->count();
        $data['page_title'] = "Tous les articles";

        return view('products.list', $data);
    }

    /**
     * Display a product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getProduct($id)
    {
        $data['product'] = Product::find($id);
        $data['sizes'] = Size::get();

        $data['availableSizes'] = [];
        foreach ($data['product']->sizes as $value){
            $data['availableSizes'][] = $value->name;
        }

        return view('products.show', $data);
    }

    /**
     * Display a listing of the products in soldes.
     *
     * @param  int  $status
     * @return \Illuminate\Http\Response
     */
    public function getSolde($status)
    {      
        // dd("test");
        $data['products'] = Product::where('discount', $status)->orderBy('created_at', 'DESC')->paginate(6)->onEachSide(0);
        $data['products_count'] = Product::where('discount', $status)->get()->count();
        $data['page_title'] = "Articles en soldes";

        return view('products.list', $data);
    }

    /**
     * Display a listing of the products by category.
     *
     * @param  int  $category_slug
     * @return \Illuminate\Http\Response
     */
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

        return view('products.list', $data);
    }
}