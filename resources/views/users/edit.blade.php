@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Edit User</h2>
  @endslot

  <form method="POST" enctype="multipart/form-data"
        action="{{ route('users.update', $user->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    @include('layouts.errors')

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" id="name" name="name"
             value="{{ old('name', $user->name) ?: $user->name }}">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" id="email" name="email"
             value="{{ old('email', $user->email) ?: $user->email }}">
    </div>
    <div class="form-group">
      <label for="summary">Summary</label>
      <textarea class="form-control" id="summary" name="summary">{{
          old('summary', $user->summary)
      }}</textarea>
    </div>
    <div class="form-group">
      <label for="circle-select">Circle</label>
      <select class="form-control" id="circle-select" name="circle_id">
      @foreach ($circles as $circle)
        <option value="{{ $circle->id }}">{{ $circle->title }}</option>
      @endforeach
      </select>
    </div>
    <input class="btn" type="submit" value="Update">
    @cancelbtn Cancel @endcancelbtn
  </form>
@endcard

@endsection
