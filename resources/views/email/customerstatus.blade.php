@component('mail::message')
Hello {{ $cStatus['uName'] ?? 'User' }}

Your WorkFlow is {{ $cStatus['status'] ?? '' }} by the Admin.

Thanks,<br>
{{ config('app.name') }}
@endcomponent