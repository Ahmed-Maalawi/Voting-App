{{--<x-mail::message>--}}
@component('mail::message')
{{--# Introduction--}}

{{--The body of your message.--}}

    {{ $comment->user->name }} commented on your idea:

    **{{ $comment->idea->title }}**

    comment: {{ $comment->body }}
@component('mail::button', ['url' =>  route('idea.show', $comment->idea)])
    Go to Idea
@endcomponent
{{--<x-mail::button :url="">--}}
{{--Go to Idea--}}
{{--</x-mail::button>--}}

Thanks,<br>
{{ config('app.name') }}
{{--</x-mail::message>--}}
@endcomponent
