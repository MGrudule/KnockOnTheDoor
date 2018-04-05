@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Edit Category</h2>
  @endslot

  <form method="POST" enctype="multipart/form-data"
        action="{{ route('categories.update', $category->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    @include('layouts.errors')

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" id="name" name="name"
             value="{{ old('name', $category->name) ?: $category->name }}">
    </div>
    <div class="form-group">
      <label for="color">Color</label>
      <input class="form-control" id="color" name="color" type="color"
             value="{{ old('color', $category->color) }}">
    </div>
    <input class="btn" type="submit" value="Update">
    @cancelbtn Cancel @endcancelbtn
  </form>
@endcard

@endsection
