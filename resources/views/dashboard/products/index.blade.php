@extends('layouts.dashboard')

@section('title','products')

@section('flow','products')




@section('content')

    <div class="mb-5">

       <a href="{{route('dashboard.products.create')}}" class="btn btn-sm btn-outline-primary mr-2">Create</a>
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
            <th>category</th>
            <th>store</th>
            <th>status</th>
            <th>Created At</th>
            <th></th>
        </tr>
        </thead>
    <tbody>

    @forelse($products as $product)
        <tr>
            <td></td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->store->name }}</td>
            <td>{{ $product->status}}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                    <form action="{{ route('dashboard.products.destroy',$product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
            </td>

        </tr>
    @empty
            <tr>
                <td colspan="9"> No products defined </td>
            </tr>
    @endforelse
    </tbody>
    </table>

  {{$products->withQuerystring()->links()}}

@endsection
