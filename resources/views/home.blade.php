@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @include('flash::message')
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <img src="/logo.svg" style="width:100%">
            </div>
        </div>
    </div>
</div>
@endsection
