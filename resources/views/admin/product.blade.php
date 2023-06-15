@extends('admin.home') @section('style')
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

  .div_desgin {
    padding-bottom: 15px;
  }

  input[type="text"],
  input[type="number"],
  select {
    color: black;
  }
</style>
@endsection @section('content') @if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  {{ session()->get('message') }}
</div>
@endif
<div class="div_center">
  <h1 class="display-4">Add Product</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="product_name" class="form-label">Product Title:</label>
            <input class="form-control" type="text" name="product_name" placeholder="Write a product name." required />
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <input class="form-control" type="text" name="description" placeholder="Write a description." required />
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Product Price:</label>
            <input class="form-control" type="number" name="price" placeholder="Write a price." required />
          </div>
          <div class="mb-3">
            <label for="discount_price" class="form-label">Product Discount:</label>
            <input class="form-control" type="number" name="discount_price" placeholder="Write a discount price."
              required />
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Product Quantity:</label>
            <input class="form-control" type="number" name="quantity" placeholder="Write a quantity." required />
          </div>
          <div class="form-group">
            <label for="parent_id">Parent Category:</label>
            <select name="parent_id" id="parent_id" class="form-control" required>
              <option value="">Select Parent Category</option>
              @foreach ($categories as $category)
              <option value="{{ $category->id }}">
                {{ $category->category_name }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label for="image" class="form-label">Product Image:</label>
            <input type="file" name="image" id="image" class="form-control" required />
          </div>
          <div class="mb-3">
            <input type="submit" value="Submit" class="btn btn-primary" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection