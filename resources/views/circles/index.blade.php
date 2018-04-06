@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Circles</h2>
  @endslot
  @slot('links')
    <a href="{{ route('circles.create') }}">
      Create
    </a>
  @endslot

  <table class="table table-sm">
  <tr>
    <th>Title</th>
    <th>Description</th>
    <th>Last Update</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>

  @foreach ($circles as $circle)
    <tr>
      <td>
        <a href="{{ route('circles.show', $circle->id) }}">
          {{ $circle->title }}
        </a>
      </td>
      <td>{{ str_limit($circle->description, 42) }}</td>
      <td>{{ $circle->updated_at->toFormattedDateString() }}</td>
      <td>
        <a class="material-icons" style="font-size: 16px"
           href="{{ route('circles.edit', $circle->id) }}">edit</a>
      </td>
      <td>
        <form class="form-inline"
              action="{{ route('circles.destroy', $circle->id) }}"
              method="POST"
              onsubmit="return confirm('Are you sure?')">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input class="material-icons" type="submit" value="delete"
                 style="border:none; background:none; cursor:pointer; color:red; font-size: 16px">
        </form>
      </td>
    </tr>
  @endforeach
  </table>
  {{ $circles->links() }}
@endcard

@endsection
