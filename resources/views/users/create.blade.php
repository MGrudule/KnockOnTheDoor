@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Register User</h2>
  @endslot

  <form method="POST" enctype="multipart/form-data"
        action="{{ route('users.store') }}">
    {{ csrf_field() }}

    @include('layouts.errors')

    <div class="form-group">
      <label for="name">Name</label>
      <input class="form-control" id="name" name="name"
             value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control" id="email" name="email"
             value="{{ old('email') }}" required>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
      @if ($errors->has('password'))
      <span class="invalid-feedback">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
      @endif
    </div>
    <div class="form-group">
      <label for="password-confirm">Confirm Password</label>
      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    </div>
    <div class="form-group">
      <label for="summary">Summary</label>
      <textarea class="form-control" id="summary" name="summary">{{
          old('summary')
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
    <input class="btn" type="submit" value="Register">
    @cancelbtn Cancel @endcancelbtn
  </form>
@endcard

@endsection
