@extends('layouts.master')

@section('content')
    <div class="row">
        @forelse ($products as $product)
        <div class="col-4 my-3">
            <a href="">
                <div class="card h-100">
                    <img src="{{$product->picture}}" class="card-img-top" alt="...">
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
    </div>
@endsection