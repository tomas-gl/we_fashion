@extends('layouts.master')

@section('content')
<div class="row my-5">
    <div class="col-12 col-md-8 offset-md-2 bg-light p-5 rounded shadow"> 
        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <!-- Nom de la catégorie -->
                <div class="mb-3 col-12 col-md-6 offset-md-3">
                    <label for="inputName" class="form-label">Nom de la catégorie</label>
                    <input type="text" class="form-control" id="inputName" name="name">
                    @if($errors->has('name'))<span class="error text-danger">{{$errors->first('name')}}</span>@endif
                </div>
            </div>
            <button type="submit" class="btn btn-primary d-block mx-auto mt-3">Créer</button>
        </form>
    </div>
</div>
@endsection