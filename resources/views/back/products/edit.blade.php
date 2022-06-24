@extends('layouts.master')

@section('content')
<div class="row my-5">
    <div class="col-12 col-md-8 offset-md-2 bg-light p-5 rounded shadow"> 
        <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="row">
                <!-- Nom du produit -->
                <div class="mb-3 col-12 col-md-6">
                    <label for="inputName" class="form-label">Nom du produit</label>
                    <input value="{{$product->name ? $product->name : ''}}" type="text" class="form-control" id="inputName" name="name">
                    @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
                </div>

                <!-- Prix -->
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label" for="price">Prix</label>
                    <input value="{{$product->price ? $product->price : ''}}" class="form-control" type="number" name="price" step=".01" id="price">
                    @if($errors->has('price'))<span class="error text-danger">{{$errors->first('price')}}</span>@endif
                </div>

                <!-- Description -->
                <div class="mb-3 col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="5"> {{$product->description ? $product->description : ''}}"</textarea>
                    @if($errors->has('description'))<span class="error text-danger">{{$errors->first('description')}}</span>@endif
                </div>

                <!-- Sélectionner une taille -->
                <div class="mb-3 col-12 col-md-6">
                    <label for="size" class="form-label">Sélectionner une taille</label>
                    <select id="size" name="size" class="form-select">
                        <option {{$product->size == 'XS' ? 'selected="selected"' : ''}}>XS</option>
                        <option {{$product->size == 'S' ? 'selected="selected"' : ''}}>S</option>
                        <option {{$product->size == 'M' ? 'selected="selected"' : ''}}>M</option>
                        <option {{$product->size == 'L' ? 'selected="selected"' : ''}}>L</option>
                        <option {{$product->size == 'XL' ? 'selected="selected"' : ''}}>XL</option>
                    </select>
                    @if($errors->has('size'))<span class="error text-danger">{{$errors->first('size')}}</span>@endif
                </div>

                <!-- Sélectionner une catégorie -->
                <div class="mb-3 col-12 col-md-6">
                    <label for="size" class="form-label">Sélectionner une catégorie</label>
                    <select id="size" name="category_id" class="form-select">
                        @if(isset($categories))
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}" {{$categorie->id == $product->category_id ? 'selected="selected"' : ''}}>{{$categorie->name}}</option>
                            @endforeach
                        @endif
                    </select>
                    @if($errors->has('category_id'))<span class="error text-danger">{{$errors->first('category_id')}}</span>@endif
                </div>

                <!-- Visibilité -->
                <div class="mb-3 col-12 col-md-6">
                    <span>Visibilité :</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="published" id="published" value="1" {{$product->published == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="published">
                            Publié
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="published" id="not_published" value="0" {{$product->published == 0 ? 'checked' : ''}}>
                        <label class="form-check-label" for="not_published">
                            Non publié
                        </label>
                    </div>
                    @if($errors->has('published'))<span class="error text-danger">{{$errors->first('published')}}</span>@endif
                </div>

                <!-- État -->
                <div class="mb-3 col-12 col-md-6">
                    <span>État :</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="discount" id="not_discount" value="0" {{$product->discount == 0 ? 'checked' : ''}}>
                        <label class="form-check-label" for="not_discount">
                            Standard
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="discount" id="discount" value="1" {{$product->discount == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="discount">
                            En solde
                        </label>
                    </div>
                    @if($errors->has('published'))<span class="error text-danger">{{$errors->first('published')}}</span>@endif
                </div>

                <!-- Référence -->                
                <div class="mb-3 col-12 col-md-6">
                    <label for="reference" class="form-label">Référence</label>
                    <input value="{{$product->reference ? $product->reference : ''}}" type="text" class="form-control" id="reference" name="reference" maxlength="16">
                    @if($errors->has('reference'))<span class="error text-danger">{{$errors->first('reference')}}</span>@endif
                </div>

                <!-- Image -->                    
                <div class="mb-3 col-12 col-md-6">
                    <label class="form-label">Sélectionner une image</label>
                    <input type="file" name="picture"> 
                    @if($errors->has('picture'))<span class="error text-danger">{{$errors->first('picture')}}</span>@endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto mt-3">Modifier</button>
        </form>
    </div>
</div>
@endsection