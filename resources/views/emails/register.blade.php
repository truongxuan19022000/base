@component('mail::message')
# Welcome to KAERUN

Click button register plans.

@component('mail::button', ['url' => route('vendor.register.plan')])
Plan Register
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
