@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Users</h2>
  @endslot
  @slot('links')
    <a href="{{ route('users.create') }}">
      Create
    </a>
  @endslot

  <table class="table table-sm">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Circle</th>
    <th>Summary</th>
    <th>Last Update</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>

  @foreach ($users as $user)
    <tr>
      <td>
        <a href="{{ route('users.show', $user->id) }}">
          {{ $user->name }}
        </a>
      </td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->circle->title }}</td>
      <td>{{ str_limit($user->summary, 42) }}</td>
      <td>{{ $user->updated_at->toFormattedDateString() }}</td>
      <td>
        <a class="material-icons"
           style="font-size: 16px"
           href="{{ route('users.edit', $user->id) }}">edit</a>
      </td>
      <td>
        <form class="form-inline"
              action="{{ route('users.destroy', $user->id) }}"
              method="POST"
              onsubmit="return confirm('Are you sure?')">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <input class="material-icons"
                  type="submit" value="delete"
                 style="border:none; background:none; cursor:pointer; color:red; font-size: 16px">
        </form>
      </td>
    </tr>
  @endforeach
  </table>
@endcard

@endsection
