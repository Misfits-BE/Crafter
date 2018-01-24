@extends('layouts.app')

@section('content')
    @include('flash::message') {{-- Flash session view instance --}}

    <div class="container">
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

                            <a href="" class="btn btn-xs btn-link">
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
                                                <td></td> {{-- Status indicator --}}
                                                <td><a href="mailto:{{ $user->email }}">{{ $user->name }}</a></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->created_at->format('d/m/Y') }}</td>

                                                <td> {{-- /Opties --}}
                                                    <span class="pull-right">
                                                        <a href="" class="text-warning">
                                                            <i class="fas fa-fw fa-lock"></i>
                                                        </a>
                                                        
                                                        <a href="" class="text-danger">
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