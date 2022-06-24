@extends('layouts.master')

@section('content')
@if(session('message'))
    {{session('message')}}
@endif
<div class="my-3">
    <a href="{{route("products.create")}}"><button type="button" class="btn btn-primary mb-3 float-end">Nouveau</button></a>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">Nom</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Prix</th>
            <th scope="col">Etat</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>{{$product->name}}</a></td>
                <td>{{$product->categorie}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount}}</td>
                <td><a href="{{route('products.edit', $product->id)}}">Modifier</a></td>
                <td>Supprimer</td>
            </tr>
            @empty
            <p>Aucun produit</p>
            @endforelse
        </tbody>
    </table>
</div>
        {{$products->links("pagination::bootstrap-4")}}
@endsection