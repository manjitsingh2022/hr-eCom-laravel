@extends('admin.home')

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
<h1 class="display-4">All Orders</h1>

<div style="margin: auto; padding-bottom:30px;">
  <form action="{{route('search')}}" method="GET">
    <input style="color:black;" type="text" name="search" id="" placeholder="Serach for Something">
    <input type="submit" value="submit">
  </form>
</div>
<table>

  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Price</th>
      <th>Product</th>
      <th>Quantity</th>
      <th>Image</th>
      <th>Payment Status</th>
      <th>Delivery Status</th>
      <th>Delivered</th>
      {{-- <th>Print PDF</th> --}}
      <th>Send Email</th>

      {{-- <th class="text-danger">Delete</th>
      <th>Edit</th> --}}
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $order)

    <tr>
      <td>{{ $order->name }}</td>
      <td>{{ $order->email }}</td>
      <td>{{ $order->phone }}</td>
      <td>{{ $order->address }}</td>
      <td>{{ $order->price }}</td>
      <td>{{ $order->product_title }}</td>
      <td>{{ $order->quantity }}</td>
      <td><img src="{{ asset('product/' . $order->image) }}" alt="Order Image"
          style="width: 100px; height: 100px; border-radius: 0;"></td>
      <td>{{ $order->payment_status }}</td>
      <td>{{ $order->delivery_status }}</td>
      <td>
        @if ($order->delivery_status=="processing")
        <a class="btn btn-danger" href="{{ route('delivered',  $order->id) }}">Delivered</a>
        @else
        <p class="p-2 mb-2 bg-success text-white">Delivered</p>
        @endif
      </td>

      {{-- <td><a href="{{route('printpdf',$order->id )}}" class="btn btn-secondary">Print PDF</a></td> --}}
      <td><a href="{{route('sendemail',$order->id )}}" class="btn btn-info">Send Email</a></td>
      {{-- <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')"
          href="{{ route('product.delete', ['id' => $order->id]) }}">Delete</a></td>
      <td><a class="btn btn-success" href="{{ route('product.edit', ['id' => $order->id]) }}">Edit</a></td> --}}
    </tr>
    @empty
    <tr>
      <td colspan="16" style="color:#dc3545; text-align:center">No Data Found.</td>
    </tr>
    @endforelse
  </tbody>
</table>
</div>
@endsection