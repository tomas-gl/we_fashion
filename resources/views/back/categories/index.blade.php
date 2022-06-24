@extends('layouts.master')

@section('content')
@if(session('message'))
    {{session('message')}}
@endif
<div class="my-3">
    <div class="row">
        <a href="{{route("categories.create")}}"><button type="button" class="btn btn-primary mb-3 float-end">Nouveau</button></a>
        <div class="col-12 col-md-6 offset-md-3">
            <table class="table table-striped text-center border shadow">
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
                        <td><a href="{{route('categories.edit', $category->id)}}">Modifier</a></td>
                        <td><a type="button" class="btn btn-danger delete-btn"
                            data-bs-toggle="modal" data-bs-target="#confirmModal{{$category->id}}">
                            Supprimer
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