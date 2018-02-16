@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash::message') {{-- Flash session view instance. --}}

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fas fa-user-plus"></i> Gebruiker toevoegen
            </div>

            <div class="panel-body">
                <form method="POST" action="{{ route('admin.users.save') }}" class="form-horizontal">
                    {{ csrf_field() }} {{-- Form field protection --}}
                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="alert alert-info" role="alert">
                                <strong><i class="fas fa-info-circle"></i> Info:</strong>
                                Er word automatisch een wachtwoord gegenereerd en gemaild naar de gebruiker.
                            </div>
                        </div>
                    </div>

                    <div class="form-group @error('name', 'has-error')">
                        <label class="control-label col-md-2">Gebruikersnaam: <span class="text-danger">*</span></label> 

                        <div class="col-md-10">
                            <input type="text" placeholder="Naam van de gebruiker" @input('name') class="form-control">
                            @error('name')
                        </div>
                    </div>

                    <div class="form-group @error('email', 'has-error')">
                        <label class="control-label col-md-2">E-mail adres: <span class="text-danger">*</span></label>

                        <div class="col-md-10">
                            <input type="email" placeholder="Email adres van de gebruiker" class="form-control" @input('email')>
                            @error('email')
                        </div>
                    </div>

                    <div class="form-group @error('role', 'has-error')">
                        <label class="control-label col-md-2">Gebruikers rol: <span class="text-danger">*</span></label>

                        <div class="col-md-10">
                            <select @input('role') class="form-control">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->name }}" @if ($role->name === old('role')) selected @endif>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>

                            @error('role') {{-- Display the role validation error --}}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-check"></i> Toevoegen
                            </button>

                            <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-danger">
                                <i class="fas fa-undo"></i> Annuleren
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
