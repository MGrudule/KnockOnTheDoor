@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>{{ $user->name }}</h2>
  @endslot
  @slot('links')
    <a href="{{ route('users.edit', $user->id) }}">
      Edit
    </a>
  @endslot

  <table class="table">
    <tr>
      <th><label>Id</label></th>
      <td>{{ $user->id }}</td>
    </tr>
    <tr>
      <th><label>Email</label></th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th><label>Circle</label></th>
      <td>
        <div class="card border-primary">
          <div class="card-body">
            <div class="card-title">{{ $user->circle->title }}</div>
            <div class="card-text text-primary"><p>{{ $user->circle->description }}</p></div>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <th><label>Summary</label></th>
      <td><p>{{ $user->summary }}</p></td>
    </tr>
    <tr>
      <th><label>Image</label></th>
      <td><img src="{{ $user->imagePublicUrl() }}" height='100px'></td>
    </tr>
    <tr>
      <th><label>Created</label></th>
      <td>{{ $user->created_at->format('d-m-Y h:m') }}</td>
    </tr>
    <tr>
      <th><label>Last Update</label></th>
      <td>{{ $user->updated_at->format('d-m-Y h:m') }}</td>
    </tr>
  </table>
  @indexbtn Go to index @endindexbtn
@endcard

@endsection
