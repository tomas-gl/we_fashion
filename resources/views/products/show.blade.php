@extends('layouts.master')

@section('content')
<div class="row my-5">
    <div class="col-5 text-center">
      <img class="img-fluid shadow rounded" style="max-height:500px" @if(!isset($product->picture_name)) src="{{ asset('storage/image_default.png') }}" @else src="{{asset('storage/images/'.$product->picture_name)}}" @endif alt="image_produit">
    </div>
    <div class="col-7 p-5 bg-light shadow rounded">
      <p class="fs-5">{{$product->name}}</p>
      <p>Description du produit : {{$product->description}}</p>
      <p>Prix : {{$product->price}}</p>
      <p>Taille :
      <select class="form-select d-inline" style="width: unset !important" aria-label="Taille">
        @foreach($availableSizes as $availableSize)
          <option>{{$availableSize}}</option>
        @endforeach
      </select>
      </p>
      <p>{{$product->published == 1 ? 'Publié' : 'Non publié'}}</p>
      <p>{{$product->published == 1 ? 'En solde' : ''}}</p>
      <p>Référence produit : {{$product->reference}}</p>
      <button type="button" class="btn btn-primary">Acheter</button>
    </div>
</div>
@endsection