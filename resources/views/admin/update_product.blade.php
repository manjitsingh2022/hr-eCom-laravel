@extends('admin.home')

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
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session()->get('message') }}
</div>
@endif

<div class="div_center">
    <h1 class="display-4">Update Product</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Product Title:</label>
                        <input class="form-control" type="text" name="title" value="{{ old('title', $product->title) }}" placeholder="Write a title." required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <input class="form-control" type="text" name="description" value="{{ old('description', $product->description) }}" placeholder="Write description." required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Product Price:</label>
                        <input class="form-control" type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="Write a price." required>
                    </div>
                    <div class="mb-3">
                        <label for="discount_price" class="form-label">Product Discount:</label>
                        <input class="form-control" type="number" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" placeholder="Write a discount price." required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Product Quantity:</label>
                        <input class="form-control" type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="Write a quantity." required>
                    </div>
                    <div class="mb-3">
                        <label for="catagory" class="form-label">Product catagory:</label>
                        <select required name="catagory" id="catagory" class="form-control">
                            <option value="" disabled>Add a catagory here</option>
                            @foreach ($catagory as $catagory)
                            <option value="{{ $catagory->id }}" {{ old('catagory', $product->catagory_id) == $catagory->id ? 'selected' : '' }}>
                                {{ $catagory->catagory_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Product Image:</label>
                        <div class="d-flex align-items-center">
                            <input type="file" name="image" id="image" class="form-control">
                            @if ($product->image)
                            <div class="mt-2 ms-3">
                                <img src="{{ asset('product/' . $product->image) }}" alt="Product Image" width="200">
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
