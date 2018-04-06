@component('mail::message')

On <b>{{ $comment->created_at->toFormattedDateString() }}</b>, for the following message:

@component('mail::panel')
{{ $comment->message->body }}
@endcomponent

<b>{{ $comment->user->name }}</b> added the following comment:

@component('mail::panel')
{{ $comment->comment }}
@endcomponent

@component('mail::button', ['url' => ''])
Show in app
@endcomponent

@endcomponent
