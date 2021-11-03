@component('mail::message')
# {{ $cStatus['status'] ?? '' }}

Your WorkFlow is Rejected{{ $cStatus['status'] ?? '' }} by the Admin.

Thanks,<br>
{{ config('app.name') }}
@endcomponent