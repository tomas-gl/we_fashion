@extends('layouts.master')

@section('content')
<div class="row my-5">
    <div class="col-4 text-center">
      <img class="shadow rounded" style="max-height:500px" @if(!isset($product->picture)) src="{{ asset('storage/image_default.png') }}" @else src="{{asset('storage/images/'.$product->picture)}}" @endif alt="image_produit">
    </div>
    <div class="col-8 bg-light rounded">
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