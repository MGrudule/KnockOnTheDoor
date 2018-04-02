@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Mails</h2>
  @endslot

  <table class="table">
  <tr>
    <th>Title</th>
    <th>View</th>
    <th>From Address</th>
    <th>From Name</th>
    <th>Subject</th>
    <th>Attachment</th>
    <th>Last Update</th>
    <th>Edit</th>
  </tr>

  @foreach ($mails as $mail)
    <tr>
      <td>
        <a href="{{ route('mails.show', $mail->id) }}">
          {{ $mail->title }}
        </a>
      </td>
      <td>{{ $mail->view }}</td>
      <td>{{ $mail->from_address }}</td>
      <td>{{ $mail->from_name }}</td>
      <td>{{ $mail->subject }}</td>
      <td>{{ $mail->attach ? "Yes" : "No" }}</td>
      <td>{{ $mail->updated_at->toFormattedDateString() }}</td>
      <td>
        <a class="material-icons" href="{{ route('mails.edit', $mail->id) }}">
          edit
        </a>
      </td>
    </tr>
  @endforeach
  </table>
@endcard

@endsection
