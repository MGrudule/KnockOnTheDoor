@component('mail::message')

# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Show in app
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
