@extends('layouts.dashboard')

@section('title','Roles')

@section('flow','roles')




@section('content')

    <div class="mb-5">

       <a href="{{route('dashboard.roles.create')}}" class="btn btn-sm btn-outline-primary mr-2">Create</a>

    </div>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif






    <table class="table">
        <thead>
        <tr>

            <th>ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th></th>
        </tr>
        </thead>
    <tbody>

    @forelse($roles as $role)
        <tr>

            <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->created_at }}</td>
            <td>
                @can('roles.update')
                <a href="{{route('dashboard.roles.edit',$role->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
                @endcan
            </td>
            <td>
                    <form action="{{ route('dashboard.roles.destroy',$role->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        @can('roles.delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        @endcan
                    </form>
            </td>

        </tr>
    @empty
            <tr>
                <td colspan="9"> No roles defined </td>
            </tr>
    @endforelse
    </tbody>
    </table>

  {{$roles->withQuerystring()->links()}}

@endsection
