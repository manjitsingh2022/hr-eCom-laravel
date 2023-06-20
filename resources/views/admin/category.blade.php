@extends('admin.home')
@section('style')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
        .input_color{
            color:black;
        }
    </style>
@endsection
@section('content')
   @if (session()->has('message'))

   <div class="alert alert-success">
    <button type="button" class="close"  data-dismiss='alert' aria-hidden="true">x</button>
    {{session()->get('message')}}
    </div>
       
   @endif

<div class="div_center">
    <h2 class="h2_font">All Catagories</h2>

    <div class="container">
        <table class="table table-bordered table-hover mx-auto w-50 text-center">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    
                <tr>
            <td>{{$category->category_name}}</td>
                    <td>
                        <a onclick=" return confirm('Are you Sure to Delete this.')" class="btn btn-danger" href="{{url('delete_catagory',$category->id)}}" >Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    
</div>


@endsection

