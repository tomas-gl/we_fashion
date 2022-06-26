@extends('layouts.master')

@section('content')
@if(session('message'))
    <p class="text-success my-3"><i class="fa fa-check pe-2"></i> {{session('message')}}</p>
@endif
<div class="my-3">
    <a href="{{route("products.create")}}" class="d-block text-end"><button type="button" class="btn btn-primary mb-3"><i class="fa fa-plus pe-2"></i>Nouveau produit</button></a>
    <div class="table-responsive">
        <table class="table table-striped text-center border border-3 shadow">
            <thead>
                <tr>
                <th scope="col">Nom</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Prix</th>
                <th scope="col">Etat</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr>
                    <td>{{$product->name}}</a></td>
                    <td>{{isset($product->categorie) ? $product->categorie : 'Aucune catégorie'}}</td>
                    <td>{{str_replace('.', ',', $product->price)}} €</td>
                    <td>{{$product->discount == 1 ? 'En solde' : 'Standard'}}</td>
                    <td><a href="{{route('products.edit', $product->id)}}" type="button" class="btn btn-secondary delete-btn"><i class="fa fa-pen pe-2"></i>Modifier</a></td>
                    <td><a type="button" class="btn btn-danger delete-btn"
                        data-bs-toggle="modal" data-bs-target="#confirmModal{{$product->id}}">
                        <i class="fa fa-trash pe-2"></i>Supprimer
                    </a></td>
                    <td class="px-0"> @include('modals.confirm_modal')</td>
                </tr>
                @empty
                <p>Aucun produit</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
        {{$products->links("pagination::bootstrap-4")}}
@endsection