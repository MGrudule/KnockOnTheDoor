@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>{{ $mail->title }}</h2>
  @endslot
  @slot('links')
    <a href="{{ route('mails.edit', $mail->id) }}">
      Edit
    </a>
  @endslot

  <table class="table">
    <tr>
      <th><label>Id</label></th>
      <td>{{ $mail->id }}</td>
    </tr>
    <tr>
      <th><label>Title</label></th>
      <td>{{ $mail->title }}</td>
    </tr>
    <tr>
      <th><label>Subject</label></th>
      <td>{{ $mail->subject }}</td>
    </tr>
    <tr>
      <th><label>Body</label></th>
      <td>
        <pre class="blade-code" v-pre>{{ wordwrap($mail->body, 75) }}</pre>
      </td>
    </tr>
    <tr>
      <th><label>View</label></th>
      <td>{{ $mail->view }}</td>
    </tr>
    <tr>
      <th><label>From Address</label></th>
      <td>{{ $mail->from_address }}</td>
    </tr>
    <tr>
      <th><label>From Name</label></th>
      <td>{{ $mail->from_name }}</td>
    </tr>
    <tr>
      <th><label>Attachment</label></th>
      <td>{{ $mail->attach }}</td>
    </tr>
    <tr>
      <th><label>Created</label></th>
      <td>{{ $mail->created_at->format('d-m-Y h:m') }}</td>
    </tr>
    <tr>
      <th><label>Last Update</label></th>
      <td>{{ $mail->updated_at->format('d-m-Y h:m') }}</td>
    </tr>
  </table>
  <form>
    <div class="row">
      <div class="col">
        @indexbtn Go to index @endindexbtn
      </div>
      <div class="col">
        <button class="btn" type="submit" formaction="{{ route($mail->view) }}">
          Preview
        </button>
      </div>
      <div class="col">
        <button class="btn" type="submit" formaction="{{ route($mail->view . '.send') }}">
          Send test mail
        </button>
      </div>
    </div>
  </form>
@endcard

@endsection
