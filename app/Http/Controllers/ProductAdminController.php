<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::paginate(15);
        foreach($data['products'] as $key=>$product){
            $data['products'][$key]['categorie'] = Category::where("id", $product->category_id)->first()->name; 
        }
            // dd($data['products']);
        return view('back.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();

        return view('back.products.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $this->validate($request, [
            'category_id' => 'integer',
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'price' =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'published' => 'integer',
            'discount' => 'integer',
            'reference' => 'required|string|min:16|max:16',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(isset($request->picture)){
            $pictureName = hash('sha256', strval(time())) . $request->picture->getClientOriginalName();
            $request->request->add(['picture_name' => $pictureName]);

            $request->file('picture')->storeAs('public/images', $pictureName);
        }

        $product->create($request->except('picture'));

        return redirect()->route('products.index')->with('message', 'success');
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
        $data['product'] = Product::find($id);
        $data['categories'] = Category::get();

        return view('back.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'category_id' => 'integer',
            'name' => 'required|string|min:5|max:100',
            'description' => 'required|string',
            'price' =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            'published' => 'integer',
            'discount' => 'integer',
            'reference' => 'required|string|min:16|max:16',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if(isset($request->picture)){
            if(isset($product->picture_name))
            {
                Storage::disk('public')->delete('images/'.$product->picture_name);
            }
            $pictureName = hash('sha256', strval(time())) . $request->picture->getClientOriginalName();
            $request->request->add(['picture_name' => $pictureName]);

            $request->file('picture')->storeAs('public/images', $pictureName);
        }

        $product->update($request->except('picture'));

        return redirect()->route('products.index')->with('message', 'Modification réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Produit supprimé !');
    }
}
