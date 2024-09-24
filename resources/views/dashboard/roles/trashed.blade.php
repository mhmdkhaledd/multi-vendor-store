@extends('layouts.dashboard')

@section('title','trashed categories')

@section('flow','trash')




@section('content')

    <div class="mb-5">

       <a href="{{route('dashboard.categories.index')}}" class="btn btn-sm btn-outline-primary">Back</a>
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
            <th>status</th>
            <th>Deleted At</th>
            <th></th>
        </tr>
        </thead>
    <tbody>

    @forelse($categories as $category)
        <tr>
            <td></td>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->status}}</td>
            <td>{{ $category->deleted_at }}</td>
            <td>
                <form action="{{ route('dashboard.categories.restore',$category->id) }}" method="post">
                    @csrf
                    @method('put')
                    <button type="submit" class="btn btn-sm btn-outline-info">Restore</button>
                </form>
            </td>
            <td>
                    <form action="{{ route('dashboard.categories.force-delete',$category->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
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
