@extends('layouts.error')

@section('title', trans('ban.title'))

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1><i class="fa fa-ban red"></i> @yield('title')</h1>
            <p class="lead">@lang('ban.description') <em><span id="display-domain"></span></em>.</p>
            
            <p>
                <a onclick="javascript::checkSite();" class="btn btn-default btn-lg green">
                    <i class="fas fa-undo"></i> @lang('ban.buttons.go-back')
                </a>

                {{-- TODO: Register config variable. --}}
                <a href="mailto:{{ config('platform.ban.contact') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-envelope"></i> @lang('ban.buttons.contact')
                </a>

                <script type="text/javascript">
                    function checkSite() {
                        var currentSite = window.location.hostname;
                        window.location = "https://" + currentSite;
                    }
                </script>
            </p>
        </div>
    </div>
@endsection