@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-7">
      <img class="w-100" @if(!isset($product->picture)) src="{{ asset('storage/image_default.png') }}" @else src="{{$product->picture}}" @endif alt="image_produit">
    </div>
    <div class="col-5">
      <p class="fs-5">{{$product->name}}</p>
      <p>Description du produit : {{$product->description}}</p>
      <p>Prix : {{$product->price}}</p>
      <p>Taille : {{$product->size}}</p>
      <p>{{$product->published == 1 ? "Publié" : "Non publié"}}</p>
      @if($product->discount == 1)
        <p>En solde</p>
      @endif
      <p>Référence : {{$product->reference}}</p>
    </div>
</div>
@endsection