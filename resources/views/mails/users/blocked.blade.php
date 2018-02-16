@component('mail::message')
# @lang('users.email.subjects.blocked-user')

@lang('users.email.messages.blocked-user', ['application' => config('app.name')])

@component('mail::button', ['url' => 'mailto:' . $contactEmail])
@lang('users.email.buttons.contact')
@endcomponent

@lang('users.email.end-greeting')<br>
{{ config('app.name') }}
@endcomponent
