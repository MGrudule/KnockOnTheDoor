@extends('layouts.app')

@section('content')

@card
  @slot('title')
    <h2>Edit {{ $mail->title }} Mail</h2>
  @endslot

  <form method="POST" enctype="multipart/form-data"
        action="{{ route('mails.update', $mail->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    @include('layouts.errors')

    <div class="form-group">
      <label for="subject">Subject</label></th>
      <input class="form-control" id="subject" name="subject"
             value="{{ old('subject', $mail->subject) ?: $mail->subject }}">
    </div>
    <div class="form-group">
      <label for="body">Body</label></th>
      <textarea class="form-control blade-code" name="body" cols="75" v-pre>{{ $mail->body }}</textarea>
    </div>
    <div class="form-group">
      <label for="view">View</label></th>
      <input class="form-control" id="view" name="view"
             value="{{ old('view', $mail->view) ?: $mail->view }}">
    </div>
    <div class="form-group">
      <label for="from">From Address</label></th>
      <input class="form-control" id="from_address" name="from_address"
             value="{{ old('from_address', $mail->from_address) ?: $mail->from_address }}">
    </div>
    <div class="form-group">
      <label for="from">From Name</label></th>
      <input class="form-control" id="from_name" name="from_name"
             value="{{ old('from_name', $mail->from_name) ?: $mail->from_name }}">
    </div>
    <div class="form-group">
      <label for="attach">Attachment</label></th>
      <input class="form-control" id="attach" name="attach"
             value="{{ old('attach', $mail->attach) ?: $mail->attach }}">
    </div>
    <input class="btn" type="submit" value="Update">
    <input class="btn" type="reset" value="Reset">
    @cancelbtn Cancel @endcancelbtn
  </form>
@endcard

@endsection
