@component('mail::message')

# Welcome to {{ config('app.name') }}

@component('mail::button', ['url' => 'https://knock.vps.codegorilla.nl'])
Launch Mobile App
@endcomponent

This message was automatically generated after registration by <b>{{ $registrar->name }}</b> from <b>{{ config('app.web_name') }}</b> at <b>{{ $user->created_at->toFormattedDateString() }}</b>.

@endcomponent
