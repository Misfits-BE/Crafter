@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash session view instance --}}
        
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users"></i> Gebruikersbeheer

                        <span class="pull-right">
                            @if (count($users) > 10)
                                <a href="" class="btn btn-xs btn-link">
                                    <i class="fa fa-search"></i> Gebruiker zoeken
                                </a>
                            @endif

                            <a href="{{ route('admin.users.create') }}" class="btn btn-xs btn-link">
                                <i class="fa fa-plus"></i> Gebruiker toevoegen
                            </a>
                        </span>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Status:</th>
                                        <th>Naam:</th>
                                        <th>E-mail adres:</th>
                                        <th colspan="2">Geregistreerd op:</th> {{-- Colspan="2" nodig voor de functies van de gebruiker --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($users) > 0) {{-- There are users found --}} 
                                        @foreach ($users as $user) {{-- Loop through the users --}}
                                            <tr>
                                                <td><code>#{{ $user->id }}</code></code>
                                                
                                                <td>
                                                    @if ($user->isBanned())
                                                        <span class="label label-warning"><i class="fas fa-fw fa-lock"></i> @lang('users.indicator-blocked')</span>
                                                    @else {{-- User is not banned --}}
                                                        @if ($user->isOnline())
                                                            <span class="label label-success">@lang('users.indicator-online')</span> 
                                                        @else {{-- User is offline --}}
                                                            <span class="label label-danger">@lang('users.indicator-offline')</span>
                                                        @endif
                                                    @endif
                                                </td>

                                                <td><a href="mailto:{{ $user->email }}">{{ $user->name }}</a></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('d/m/Y') }}</td>

                                                <td> {{-- /Opties --}}
                                                    <span class="pull-right">
                                                        @cannot('same-user', $user) {{-- Rendered user is not the same then the authencated user --}}
                                                            @if ($user->isBanned()) {{-- The user is blocked in the system. --}} 
                                                                <a href="{{ route('admin.users.unlock', $user) }}" class="text-warning">
                                                                    <i class="fas fa-fw fa-unlock"></i>
                                                                </a>
                                                            @else {{-- The user is not banned --}}
                                                                <a href="{{ route('admin.users.lock', $user) }}" class="text-warning">
                                                                    <i class="fas fa-fw fa-lock"></i>
                                                                </a>
                                                            @endif
                                                        @endcannot


                                                        <a href="{{ route('admin.users.destroy', $user) }}" class="text-danger">
                                                            <i class="fas fa-fw fa-times"></i>
                                                        </a>
                                                    </span>
                                                </td> {{-- /Opties --}}
                                            </tr>
                                        @endforeach {{-- /// Loop --}}
                                    @else {{-- No users found --}}
                                        <tr>
                                            <td colspan="6"><i class="text-muted">(Er zijn geen gebruikers gevonden in het systeem.)</i></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{ $users->render('vendor.pagination.simple-default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection