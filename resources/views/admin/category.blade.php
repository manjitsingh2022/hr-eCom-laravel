@extends('admin.home')
@section('title')
Category Lists
@endsection
@section('style')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .input_color{
            color:black;
        }

        .pagination {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    </style>
@endsection
@section('content')
<div class="card">


@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
    {{ session()->get('message') }}
</div>
@endif

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
    <h2 class="h2_font">All Categories</h2>

    <div class="container">
        <table class="table table-bordered table-hover mx-auto w-50 text-center">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->category_name }}</td>
                   
                    <td> 
                        <a class="nav-link"href="{{ route('edit_category', $category->id) }}">
                        <button type="button" class="btn btn-inverse-warning btn-rounded btn-fw btn-sm">Edit</button>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-inverse-danger btn-rounded btn-fw btn-sm" data-toggle="modal" data-target="#myConfirmDlg{{ $category->id }}">
                            Delete
                        </button>
                    </td>        
                   
                </tr>
                <div class="modal fade" id="myConfirmDlg{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                <a href="{{ route('delete_category', $category->id) }}" class="btn btn-danger">Delete</a>
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
<div class="pagination mt-5 mb-5 " style="justify-content: space-evenly;">
    <div>
        <!-- Previous page link -->
        @if ($categories->onFirstPage())
            <span class="disabled">&laquo; Previous</span>
        @else
            <a href="{{ $categories->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
        @endif
    </div>
    <div>
        Page {{ $categories->currentPage() }} of {{ $categories->lastPage() }}
        @if ($categories->hasMorePages())
            <a href="{{ $categories->nextPageUrl() }}" rel="next">Next &raquo;</a>
        @else
            <span class="disabled">Next &raquo;</span>
        @endif
    </div>
</div>
    </div>
</div>


</div>
@endsection

