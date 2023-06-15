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
    <h2 class="h2_font">Add Catagory</h2>


    <form action="{{url('/add_category')}}" method="POST">
      
        @csrf

        <input type="text" class="input_color" name="catagory" id="" placeholder="Write  Catagory name">
         <input type="submit" value="Add Catagory" class="btn btn-primary">
    </form>

    <div class="container">
        <table class="table table-bordered table-hover mx-auto w-50 text-center">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $catagory)
                    
                <tr>
            <td>{{$catagory->catagory_name}}</td>
                    <td>
                        <a onclick=" return confirm('Are you Sure to Delete this.')" class="btn btn-danger" href="{{url('delete_catagory',$catagory->id)}}" >Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    
</div>


@endsection

