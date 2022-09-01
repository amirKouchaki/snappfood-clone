@component('mail::message')
# Your code is {{$randomToken}}

This code is used to verify your email address. Please enter the code in the website

@component('mail::button', ['url' => 'https://snappfood.ir'])
go to official website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
