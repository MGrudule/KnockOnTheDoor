@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Messages</h2>
  @endslot
  @slot('links')
    <a href="{{ route('messages.create') }}">
      Create new message
    </a>
  @endslot

  <table class="table">
  <tr>
    <th>Name</th>
    <th>Color</th>
    <th>Last Update</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>

  @foreach ($categories as $category)
    <tr>
      <td>
        <a href="{{ route('categories.show', $category->id) }}">
          {{ $category->name }}
        </a>
      </td>
      <td>
        <div class="panel"
             style="background-color: {{ $category->color }}"
             title="{{ $category->color }}">&nbsp;</div>
      </td>
      <td>{{ $category->updated_at->toFormattedDateString() }}</td>
      <td>
        <a class="material-icons" href="{{ route('categories.edit', $category->id) }}">
          edit
        </a>
      </td>
      <td>
        <form class="form-inline"
              action="{{ route('categories.destroy', $category->id) }}"
              method="POST"
              onsubmit="return confirm('Are you sure?')">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input class="material-icons"
                  type="submit" value="delete"
                 style="border:none; background:none; cursor:pointer; color:red">
        </form>
      </td>
    </tr>
  @endforeach
  </table>
@endcard

@endsection
