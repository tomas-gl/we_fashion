@extends('layouts.master')

@section('content')
    <div class="row">
        <h1 class="my-3">{{$page_title}}</h1>
        @forelse ($products as $product)
        <div class="col-4 my-3">
            <a href="{{route('product', $product->id)}}">
                <div class="card h-100">
                    <img  @if(!isset($product->picture)) src="{{ asset('storage/image_default.png') }}" @else src="{{$product->picture}}" @endif alt="image_produit">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
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