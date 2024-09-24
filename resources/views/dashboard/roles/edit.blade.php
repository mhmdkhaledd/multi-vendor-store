@extends('layouts.dashboard')

@section('title','edit category')

@section('flow','categories')
@section('flow','edit category')

@section('content')



    <form action="{{route('dashboard.categories.update',$category->id)}}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="name" class ="form-control" value="{{old('name',$category->name)}}">

            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
        <div class="form-group">
            <label for="">Category Parent</label>
            <select name="parent_id" class="form-control">
                <option value="">primary category</option>
                @foreach($parents as $parent)
                    <option value="{{$parent->id}}" @selected(@old('parent_id',$category->parent_id) == $parent->id)>{{$parent->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control">{{old('description',$category->description)}}</textarea>
        </div>
        <div class="form-group">
            <label for=""> Image </label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for=""> status </label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status"  value="active" @checked(old('status',$category->status) == 'active')>
                    <label class="form-check-label">
                        active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="archived"@checked(old('status',$category->status) == 'archived')>
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



