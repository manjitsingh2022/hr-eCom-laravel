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

    th,
    td {
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
    <table class="text-center w-100">
        <!-- Table header -->
        <thead style="text-align-last: center;">
            <tr>
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
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->description }}</td>
                <td><img src="{{ asset('product/' . $product->image) }}" alt="Product Image" class="product-image"></td>
                <td>{{ $product->category->category_name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->discount_price }}</td>
                <td>
                    <a class="nav-link" href="{{ route('product.edit', ['id' => $product->id]) }}">
                        <button type="button" class="btn btn-inverse-warning btn-rounded btn-fw btn-sm">Edit</button>
                    </a>
                </td>
                <td>
                    <button type="button" class="btn btn-inverse-danger btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#myConfirmDlg{{ $product->id }}">
                        Delete
                    </button>
                </td>
            </tr>

            <div class="modal fade" id="myConfirmDlg{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this item?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="{{ route('product.delete', ['id' => $product->id]) }}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            @empty
            <tr >
                <td colspan="9">
                    <p class="text-center bg-danger">No records found.</p>
                </td>
            </tr>
            @endforelse
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
