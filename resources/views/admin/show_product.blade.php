@extends('admin.home')

@section('style')
  <style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        border-bottom: 1px solid #ddd;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

   

    img.product-image {
        width: 100px;
        height: 100px;
        border-radius: 0;
    }

    .btn-delete {
        background-color: #dc3545;
        color: #fff;
    }

    .btn-delete:hover {
        background-color: #c82333;
    }

    .btn-edit {
        background-color: #28a745;
        color: #fff;
    }

    .btn-edit:hover {
        background-color: #218838;
    }
</style>
@endsection

@section('content')
<h1 class="display-4">All Products</h1>
<table >
   
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount Price</th>
            <th class="text-danger">Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td><img src="{{ asset('product/' . $product->image) }}" alt="Product Image" style="width: 100px; height: 100px; border-radius: 0;"></td>
            <td>{{ $product->catagory }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount_price }}</td>
            <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')" href="{{ route('product.delete', ['id' => $product->id]) }}">Delete</a></td>
            <td><a class="btn btn-success" href="{{ route('product.edit', ['id' => $product->id]) }}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
