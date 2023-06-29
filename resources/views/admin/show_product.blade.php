@extends('admin.home')

@section('title')
Show Products
@endsection

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

    .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .div_center {
        text-align: center;
      }
</style>
@endsection

@section('content')
<div class="card px-5">
    
<h1 class="div_center">All Products</h1>
<table class="text-center w-100  ">
    {{-- table table-bordered table-hover mx-auto w-50 --}}
    <!-- Table header -->
    <thead style="text-align-last: center;">
        <!-- Header row -->
        <tr >
            <!-- Table headings -->
            <th>Product Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Discount Price</th>
            <th>Edit</th>
            <th class="text-danger">Delete</th>
        </tr>
    </thead>
    <tbody>
        <!-- Table rows -->
        @foreach($products as $product)
       
        <tr>
            <!-- Table data -->
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->description }}</td>
            <td><img src="{{ asset('product/' . $product->image) }}" alt="Product Image" class="product-image"></td>
            <td>{{ $product->category->category_name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->discount_price }}</td>
          
   <td> <a class="nav-link"href="{{ route('product.edit', ['id' => $product->id]) }}">
    <button type="button" class="btn btn-inverse-warning btn-rounded btn-fw btn-sm">Edit</button>
    </a></td>
            <td> <a class="nav-link" onclick="return confirm('Are you sure to delete this?')" href="{{ route('product.delete', ['id' => $product->id]) }}">
                <button type="button" class="btn btn-inverse-danger btn-rounded btn-fw btn-sm" >Delete</button>
        </a></td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- Customized pagination links -->
<div class="pagination mb-4 mt-4">
    <div>
        <!-- Previous page link -->
        @if ($products->onFirstPage())
            <span class="disabled">&laquo; Previous</span>
        @else
            <a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        @endif
    </div>
    <div>
        Page {{ $products->currentPage() }} of {{ $products->lastPage() }}
        @if ($products->hasMorePages())
            <a href="{{ $products->nextPageUrl() }}" rel="next">Next &raquo;</a>
        @else
            <span class="disabled">Next &raquo;</span>
        @endif
    </div>
</div>
</div>
@endsection
