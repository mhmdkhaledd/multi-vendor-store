@extends('layouts.dashboard')

@section('title','categories')

@section('flow','categories')




@section('content')

    <div class="mb-5">
        @can('categories.create')
       <a href="{{route('dashboard.categories.create')}}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
        @endcan

        <a href="{{route('dashboard.categories.trashed')}}" class="btn btn-sm btn-outline-dark">Trash</a>
    </div>

    @if(session()->has('success'))

        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <form action="{{URL::current()}}" method="get" class="d-flex justify-content-mb-4">
    <input name="name" placeholder="name" class="form-control mx-2" />
    <select name="status" class="form-control mx-2">
        <option value="">all</option>
        <option value="active">active</option>
        <option value="archived">archived</option>
    </select>
    <button class="btn-btn-dark mx-2">filter</button>
    </form>




    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>products #</th>
            <th>status</th>
            <th>Created At</th>
            <th></th>
        </tr>
        </thead>
    <tbody>

    @forelse($categories as $category)
        <tr>
            <td></td>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->parent? $category->parent->name :'_' }}</td>
            <td>{{ $category->products_count}}</td>
            <td>{{ $category->status}}</td>
            <td>{{ $category->created_at }}</td>
            <td>
                @can('$categories.update')
                <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
                @endcan
            </td>
            <td>
                    <form action="{{ route('dashboard.categories.destroy',$category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        @can('categories.delete')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        @endcan
                    </form>
            </td>

        </tr>
    @empty
            <tr>
                <td colspan="7"> No categories defined </td>
            </tr>
    @endforelse
    </tbody>
    </table>

  {{$categories->withQuerystring()->links()}}

@endsection
