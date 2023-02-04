<x-mail::message>
# {{ $type }}

**{{ $subject }}**

{{ $body }}

@if ($link != null)
<x-mail::button :url="$link">
{{ $button_title }}
</x-mail::button>
@endif

@if ($link != null)
লিংকঃ <a href="{{ $link }}">{{ $link }}</a>
@endif

ধন্যবাদ,<br>
{{ config('app.name') }}
</x-mail::message>
