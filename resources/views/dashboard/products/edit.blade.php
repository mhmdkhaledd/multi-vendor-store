@extends('layouts.dashboard')

@section('title','edit product')

@section('flow','products')
@section('flow','edit product')

@section('content')



    <form action="{{route('dashboard.products.update',$product->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">product Name</label>
            <input type="text" name="name" class ="form-control" value="{{old('name',$product->name)}}">

            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label for="">Category </label>
            <select name="category_id" class="form-control">
                <option value="">primary category</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @selected(@old('category_id',$product->category_id) == $category->id)>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control">{{old('description',$product->description)}}</textarea>
        </div>
        <div class="form-group">
            <label for=""> Image </label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for=""> status </label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status"  value="active" @checked(old('status',$product->status) == 'active')>
                    <label class="form-check-label">
                        active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="archived"@checked(old('status',$product->status) == 'archived')>
                    <label class="form-check-label">
                        archived
                    </label>
                </div>
            </div>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">update</button>
        </div>
    </form>


@endsection



