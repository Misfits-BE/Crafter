@component('mail::message')
# @lang('ban.email.titles.unban')

@lang('ban.email.messages.active-user', ['application' => config('app.name')])


@lang('users.email.end-greeting')<br>
{{ config('app.name') }}
@endcomponent
