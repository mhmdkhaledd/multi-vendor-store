@extends('layouts.dashboard')

@section('title','Edit Profile')

@section('flow','Edit Profile')
@section('flow','edit profile')

@section('content')



    <form action="{{route('dashboard.profile.update')}}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md-6">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" placeholder="First Name" :value="$user->profile->first_name">
            </div>
            <div class="col-md-6">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" placeholder="Last Name" :value="$user->profile->last_name">
            </div>
        </div>  

        <div class="row">
            <div class="col-md-6">
                <label for="birthday">Birthday</label>
                <input type="date" class="form-control" id="birthday" :value="$user->profile->birthday">
            </div>
            <div class="col-md-6">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="male" {{ $user->profile ? ($user->profile->gender == 'male' ? 'selected' : '') : '' }}>Male</option>
                    <option value="female" {{ $user->profile ? ($user->profile->gender == 'female' ? 'selected' : '') : '' }}>Female</option>
                </select>
            </div>
        </div>  

        <div class="row">
            <div class="col-md-12">
                <label for="street_address">Street Address</label>
                <input type="text" class="form-control" id="street_address" placeholder="Street Address" :value="$user->profile->street_address">
            </div>
        </div>  

        <div class="row">
            <div class="col-md-4">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" placeholder="City" :value="$user->profile->city">
            </div>
            <div class="col-md-4">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" placeholder="State" :value="$user->profile->state">
            </div>
            <div class="col-md-4">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" placeholder="Postal Code" :value="$user->profile->postal_code">
            </div>
        </div>  

        <div class="row">
            <div class="col-md-6">
                <label for="country">Country</label>
                <select class="form-control" id="country">
                    <option value="">Select Country</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="locale">Locale</label>
                <select class="form-control" id="locale">
                    <option value="">Select Locale</option>
                </select>

            </div>
        </div>  

        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>

@endsection



