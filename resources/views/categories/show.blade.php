@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>{{ $category->name }}</h2>
  @endslot
  @slot('links')
    <a href="{{ route('categories.edit', $category->id) }}">
      Edit
    </a>
  @endslot

  <table class="table">
    <tr>
      <th><label>Id</label></th>
      <td>{{ $category->id }}</td>
    </tr>
    <tr>
      <th><label>Color</label></th>
      <td>
        <div class="panel"
             style="background-color: {{ $category->color }}"
             title="{{ $category->color }}">&nbsp;</div>
      </td>
    </tr>
    <tr>
      <th><label>Created</label></th>
      <td>{{ $category->created_at->format('d-m-Y h:m') }}</td>
    </tr>
    <tr>
      <th><label>Last Update</label></th>
      <td>{{ $category->updated_at->format('d-m-Y h:m') }}</td>
    </tr>
  </table>
  @indexbtn Go to index @endindexbtn
@endcard

@endsection
