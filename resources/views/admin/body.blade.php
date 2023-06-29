@extends('admin.home')

@section('style')
<style type="text/css">
  .processing-icon {
    display: inline-block;
    position: relative;
  }

  .processing-icon .mdi {
    font-size: 24px;
    color: #e90000;
    /* Adjust the color as needed */
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
<!-- content-wrapper Start -->
{{-- <div class="row">
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0"> {{$total_product}}</h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="mdi mdi-package-variant-closed icon-products"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Products</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">{{$total_order}}</h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success">
              <span class="mdi mdi-cart icon-orders"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Orders</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">{{$total_user}}</h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-danger">
              <span class="mdi mdi-account-multiple icon-customers"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Customers</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0"></h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="mdi mdi-currency-usd icon-revenue"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Revenue</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">{{$total_delivered}}</h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="mdi mdi-package icon-delivered "></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Delivered</h6>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-9">
            <div class="d-flex align-items-center align-self-start">
              <h3 class="mb-0">

              </h3>
            </div>
          </div>
          <div class="col-3">
            <div class="icon icon-box-success ">
              <span class="mdi mdi-loading mdi-spin"></span>
            </div>
          </div>
        </div>
        <h6 class="text-muted font-weight-normal">Total Processing</h6>
      </div>
    </div>
  </div>



</div> --}}
<div class="stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title text-center">Category Details</h4>
      
      <div class="table-responsive">
        <table class="table table-bordered table-contextual">
          <thead>
            <tr>
              <th>ID</th>
              <th>Parent Category Name</th>
              <th>Category Name</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
                <tr >
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->parent_id ? $category->parent->category_name : '' }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->status }}</td>
                </tr>
                @if ($category->subcategories->count() > 0)
                    @foreach ($category->subcategories as $subcategory)
                        <tr >
                            <td>{{ $subcategory->id }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $subcategory->category_name }}</td>
                            <td>{{ $subcategory->status }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
        
        </table>

      </div>
    </div>
  </div>
</div>


<!-- content-wrapper ends -->
</div>


@endsection