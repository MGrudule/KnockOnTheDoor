@extends('layouts.app')

@section('content')

    @isset($image)
    <img src="{{ $image }}">
    @endisset

    <form method="post" enctype="multipart/form-data" action="{{ route('users.update.image', auth()->user()->id) }}" class="mb-5">
        {{ csrf_field() }}
        @include('layouts.errors')
        <div class="form-group">
            <label for="file">File</label>
            <input class="form-control-file" type="file" name="file" id="file">
        </div>

        <input type="submit" value="Upload" class="btn">
    </form>

@endsection
