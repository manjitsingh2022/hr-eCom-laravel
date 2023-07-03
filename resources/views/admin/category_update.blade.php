@extends('admin.home')
@section('title')
Category Updated
@endsection
@section('style')
<style type="text/css">
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    label {
        display: flex;
        align-items: center;
        width: 200px;
    }

    input[type="text"],
    input[type="number"],
    select {
        color: black;
    }
</style>
@endsection

@section('content')
<div class="card">




@if (session()->has('errors'))
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="div_center">
    <h1 class="display-4">Update Category</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Product Title:</label>
                        <input class="form-control" type="text" name="category_name" value="{{ old('product_name', $category->category_name) }}" placeholder="Write a product name." required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection







