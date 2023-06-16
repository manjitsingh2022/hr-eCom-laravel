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


<h1>Create Category</h1>


<form action="{{ route('categories.store') }}" method="POST">
  @csrf
  <div class="form-group">
    <label for="category_name">Category Name</label>
    <input type="text" name="category_name" id="category_name" class="form-control" required>
  </div>

  {{-- <div class="form-group">
  <label for="parent_id">Parent Category</label>
  <select name="parent_id" id="parent_id" class="form-control">
    <option value="">Select Parent Category</option>
    @foreach ($categories as $category)
      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
    @endforeach
  </select>
</div> --}}

<div class="form-group">
  <label for="subcategory_id">Sub Category</label>
  <select name="subcategory_id" id="subcategory_id" class="form-control">
    <option value="">Select Subcategory</option>
    @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
      @if($category->subcategories->count() > 0)
        @foreach($category->subcategories as $subcategory)
          <option value="{{ $subcategory->id }}">- {{ $subcategory->category_name }}</option>
        @endforeach
      @endif
    @endforeach
  </select>
</div>



  


  <button type="submit" class="btn btn-primary">Create Category</button>
</form>



@endsection