@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>{{ $circle->title }}</h2>
  @endslot
  @slot('links')
    <a href="{{ route('circles.edit', $circle->id) }}">
      Edit
    </a>
  @endslot

  <table class="table">
    <tr>
      <th><label>Id</label></th>
      <td>{{ $circle->id }}</td>
    </tr>
    <tr>
      <th><label>Description</label></th>
      <td><p>{{ $circle->description }}</p></td>
    </tr>
    <tr>
      <th><label>Created</label></th>
      <td>{{ $circle->created_at->format('d-m-Y h:m') }}</td>
    </tr>
    <tr>
      <th><label>Last Update</label></th>
      <td>{{ $circle->updated_at->format('d-m-Y h:m') }}</td>
    </tr>
  </table>
  @indexbtn Go to index @endindexbtn
@endcard

@endsection
