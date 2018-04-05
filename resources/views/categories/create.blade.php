@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>New Category</h2>
  @endslot

  <form method="POST" enctype="multipart/form-data"
        action="{{ route('categories.store') }}">
    {{ csrf_field() }}

    @include('layouts.errors')

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" id="name" name="name"
             value="{{ old('name') }}">
    </div>
    <div class="form-group">
      <label for="color">Color</label>
      <input class="form-control" id="color" name="color" type="color" value="{{ old('color') }}">
    </div>
    <input class="btn" type="submit" value="Create">
    @cancelbtn Cancel @endcancelbtn
  </form>
@endcard

@endsection
