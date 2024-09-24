@extends('layouts.dashboard')

@section('title','categories')

@section('flow','categories')
$
@section('content')

    <form action="{{route('dashboard.categories.store')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">


            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Category Parent</label>
            <select name="parent_id" class="form-control">
                <option value="">primary category</option>
                @foreach($parents as $parent)
                    <option value="{{$parent->id}}">{{$parent->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for=""> Image </label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for=""> status </label>
            <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status"  value="active" checked>
                    <label class="form-check-label">
                       active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="archived">
                    <label class="form-check-label">
                        archived
                    </label>
                </div>
            </div>

        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">save</button>
            </div>
    </form>


@endsection



