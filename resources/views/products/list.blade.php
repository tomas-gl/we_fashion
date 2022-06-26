@extends('layouts.master')

@section('content')
    <div class="row">
        <h1 class="my-3">{{$page_title}}</h1>
        <span class="text-end">{{$products_count}} {{$products_count > 1 ?  'Résultats' : 'Résultat'}}</span>
        @forelse ($products as $product)
        <div class="col-12 col-md-6 col-xl-4 my-3">
            <a href="{{route('product', $product->id)}}" class="text-decoration-none text-dark">
                <div class="card card-product h-100 shadow">
                    <img class="img-card" @if(!isset($product->picture_name)) src="{{ asset('storage/image_default.png') }}" @else src="{{asset('storage/images/'.$product->picture_name)}}" @endif alt="image_produit">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{str_replace('.', ',', $product->price)}} €</p>
                    </div>
                </div>
            </a>
        </div>
@empty
    <p>Aucun produits</p>
@endforelse
        {{$products->links("pagination::bootstrap-4")}}

    </div>
@endsection