@extends('layouts.master')

@section('content')
@if(session('message'))
    <p class="text-success my-3"><i class="fa fa-check pe-2"></i> {{session('message')}}</p>
@endif
<div class="my-3">
    <div class="row">
        <a href="{{route("categories.create")}}" class="d-block text-end"><button type="button" class="btn btn-primary mb-3 float-end"><i class="fa fa-plus pe-2"></i>Nouvelle catégorie</button></a>
        <div class="col-12 col-md-6 offset-md-3">
            <table class="table table-striped text-center border border-3 shadow">
                <thead>
                    <tr>
                    <th scope="col">Nom</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                    <tr>
                        <td>{{$category->name}}</a></td>
                        <td><a href="{{route('categories.edit', $category->id)}}" type="button" class="btn btn-secondary delete-btn"><i class="fa fa-pen pe-2"></i>Modifier</a></td>
                        <td><a type="button" class="btn btn-danger delete-btn"
                            data-bs-toggle="modal" data-bs-target="#confirmModal{{$category->id}}">
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
</div>
        {{$categories->links("pagination::bootstrap-4")}}
@endsection