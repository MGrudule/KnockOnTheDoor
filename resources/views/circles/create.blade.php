@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>New Circle</h2>
  @endslot

  <form method="POST" enctype="multipart/form-data"
        action="{{ route('circles.store') }}">
    {{ csrf_field() }}

    @include('layouts.errors')

    <div class="form-group">
      <label for="title">Title</label>
      <input class="form-control" id="title" name="title"
             value="{{ old('title') }}">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description">{{
        old('description')
      }}</textarea>
    </div>
    <input class="btn" type="submit" value="Create">
    @cancelbtn Cancel @endcancelbtn
  </form>
@endcard

@endsection
