@extends('admin.home')
@section('title')
Add Product
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

  .div_desgin {
    padding-bottom: 15px;
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


<div class="div_center">
  <h1>Add Product</h1>
</div>

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
            <input class="form-control" type="number" name="discount_price" placeholder="Write a discount price." required />
          </div>
          <div class="mb-3">
            <label for="quantity" class="form-label">Product Quantity:</label>
            <input class="form-control" type="number" name="quantity" placeholder="Write a quantity." required />
          </div>
          <div class="mb-3">
            <label for="parent_id">Parent Category:</label>
            <select name="parent_id" id="parent_id" class="form-control" required>
                <option value="">Select Parent Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group" id="hidesubcategory">
            <label for="subcategory">Sub Category:</label>
            <select name="subcategory_id" id="subcategory" class="form-control" >
                <option value="">Select Sub Category</option>
            </select>
        </div>
        
          <div class="mb-3">
            <label for="image" class="form-label">Product Image:</label>
            <input type="file" name="image" id="image" class="form-control" required />
          </div>
          <div class="mb-5 div_center">
            <input type="submit" value="Submit" class="btn btn-primary" />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- script section start --}}
@section('scriptcontent')
<script>
  $(document).ready(function() {
    $('#parent_id').change(function(e) {
      var parentCategoryId = $(this).val();
      console.log(parentCategoryId, 'parentCategoryId');
      if (parentCategoryId) {
        $.ajax({
          url: '{{ route('getSubcategories') }}',
          type: 'post',
          dataType: 'json',
          data: {
            _token: '{{ csrf_token() }}',
            parentCategoryId: parentCategoryId
          },
          success: function(data) {
            console.log(data, 'datadatadata');
            $('#subcategory').empty().append('<option value="">Select Sub Category</option>');
            
            if (data.length > 0) {
              $.each(data, function(index, subcategory) {
                console.log(subcategory, index, 'subcategoryidex');
                $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.category_name + '</option>');
              });
              $('#hidesubcategory').show();
            } else {
              $('#hidesubcategory').hide();
              $('#subcategory').empty();
            }
          },

          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      } else {
        $('#subcategory').empty().append('<option value="">Select Sub Category</option>');
        $('#hidesubcategory').hide();
      }
    });
  });
</script>

@endsection
