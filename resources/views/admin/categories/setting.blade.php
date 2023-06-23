<!-- resources/views/categories/create.blade.php -->

@extends('admin.home')
@section('style')
<style type="text/css">

</style>
@endsection
@section('content')

@if (session('error'))
<div class="alert alert-danger">
  {{ session('error') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif


<h1>Settings </h1>


<form action="{{ route('categories.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="category_name">Category Name</label>
    <input type="text" name="category_name" id="category_name" class="form-control" required>
  </div>

  <div class="form-group">
  <label for="parent_id">Parent Category</label>
  <select name="parent_id" id="parent_id" class="form-control">
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
  


  <button type="submit" class="btn btn-primary">Create Category</button>
</form>



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