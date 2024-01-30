@component('mail::message')
<p>Welcome, {{ $user }}</p>

<p>
You have been invited to join {{ config('app.name') }}.
</p>

@component('mail::button', ['url' => $url])
Complete Account Registration
@endcomponent

@include('components.footer')
@endcomponent
