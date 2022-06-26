<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use Illuminate\Support\Facades\Storage;

class ProductAdminController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['products'] = Product::orderBy('created_at', 'DESC')->paginate(15)->onEachSide(0);
        foreach($data['products'] as $key=>$product){
            if($product->category_id)
            $data['products'][$key]['categorie'] = Category::where("id", $product->category_id)->first()->name; 
        }
        return view('back.products.index', $data);
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();
        $data['sizes'] = Size::get();

        return view('back.products.create', $data);
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $product = Product::create($request->except('picture'));
        $product->sizes()->attach($request->sizes);

        return redirect()->route('products.index')->with('message', 'Produit créé !');
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::get();
        $data['sizes'] = Size::get();

        $data['checkedSizes'] = [];
        foreach ($data['product']->sizes as $value){
            $data['checkedSizes'][] = $value->id;
        }

        return view('back.products.edit', $data);
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Http\Product  $product
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
        $product->sizes()->sync($request->sizes);

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
