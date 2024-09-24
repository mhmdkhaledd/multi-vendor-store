@extends('layouts.dashboard')

@section('title','Roles')

@section('flow','roles')

@section('content')

    <div class="form-group">
        <x-form.input label="Role Name" class="form-control-lg" role="input" name="name" :value="$role->name" />
    </div>

    <fieldset>
        <legend>{{ __('Abilities') }}</legend>

        @foreach(config('abilities') as $ability_code=>$ability_name)
            <div class="row mb-2">
                <div class="col-md-6">
                    {{ $ability_name }}
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $ability_code }}]" value="allow" checked> Allow
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $ability_code }}]" value="deny"> Deny
                </div>
                <div class="col-md-2">
                    <input type="radio" name="abilities[{{ $ability_code }}]" value="inherit"> Inherit
                </div>

            </div>
        @endforeach
    </fieldset>

    <div class="col-md-12">
        <div class="form-group mb-3">
            <a href="{{ route('dashboard.roles.index') }}" class="btn btn-primary">save</a>
        </div>
    </div>
@endsection



