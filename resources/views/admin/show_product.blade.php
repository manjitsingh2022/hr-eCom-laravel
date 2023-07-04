@extends('admin.home')

@section('title')
Products
@endsection

@section('style')
    <style type="text/css">
        th,
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        img.product-image {
            width: 100px;
            height: 100px;
            border-radius: 0;
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .div_center {
            text-align: center;
        }

        #deleteAllSelectedRecords {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #deleteAllSelectedRecords:hover {
            background-color: #c82333;
        }
    </style>
@endsection

@section('content')
    <div class="card px-5">
        <h1 class="div_center">Products</h1>
        <div>
            <button id="deleteAllSelectedRecords" class="btn btn-danger btn-rounded btn-fw " type="button" >Delete All Products</button>
                <!-- Add this element to display the message -->
                <p id="deleteMsg" style="display: none;">No records selected for deletion.</p>

        </div>
        <table class="text-center w-100">
            <!-- Table header -->
            <thead style="text-align-last: center;">
                <tr>
                    <td><input type="checkbox" class="select-all-delete text-center" id="select-all-delete"> Check all</td>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td><input type="checkbox" value="{{ $product->id }}" class="select-single"></td>
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
                            <button id="delete-button" type="button" class="btn btn-inverse-danger btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#myConfirmDlg{{ $product->id }}">
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
                    <tr>
                        <td colspan="9">
                            <p class="text-center bg-danger">No records found.</p>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Customized pagination links -->
        <nav>
            <ul class="pagination mb-4 mt-4">
                <li class="page-item">
                    @if ($products->onFirstPage())
                        <span class="page-link disabled">&laquo; Previous</span>
                    @else
                        <a class="page-link" href="{{ $products->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
                    @endif
                </li>
                <li class="page-item disabled">
                    <span class="page-link">Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</span>
                </li>
                <li class="page-item">
                    @if ($products->hasMorePages())
                        <a class="page-link" href="{{ $products->nextPageUrl() }}" rel="next">Next &raquo;</a>
                    @else
                        <span class="page-link disabled">Next &raquo;</span>
                    @endif
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('scriptcontent')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#select-all-delete").change(function() {
                const isChecked = $(this).prop("checked");
                const selectedCheckedIDs = [];
    
                $("input:checkbox.select-single").prop('checked', isChecked);
    
                if (isChecked) {
                    $("input:checkbox.select-single").each(function() {
                        selectedCheckedIDs.push($(this).val());
                    });
                }
    
                console.log(selectedCheckedIDs);
            });
    
            function deleteSelectedRecords(selectedIDs) {
                if (selectedIDs.length === 0) {
                    $("#deleteMsg").show();
                    console.log("No records selected for deletion.");
                    return;
                }
    
                $("#deleteMsg").hide();
    
                $.ajax({
                    url: "{{ route('delete.values') }}",
                    method: "delete",
                    data: { selectedIDs: selectedIDs },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response, 'response');
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
    
                console.log("Deleting selected records:", selectedIDs);
            }
    
            $("#deleteAllSelectedRecords").click(function() {
                const selectedCheckedIDs = [];
    
                $("input:checkbox.select-single:checked").each(function() {
                    selectedCheckedIDs.push($(this).val());
                });
    
                deleteSelectedRecords(selectedCheckedIDs);
            });
        });
    </script>
    
    @endsection
