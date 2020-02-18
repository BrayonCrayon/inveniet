@component('mail::message')
    Hello **{{$name}}**,

    {{$eventName}}, will be starting on {{$starts_at}}.

    Sincerely,
    Inveniet Admin.
@endcomponent
