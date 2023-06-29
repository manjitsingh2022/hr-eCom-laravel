@extends('admin.home')

@section('style')
  <style type="text/css">

</style>
@endsection

@section('content')
{{-- pdf page --}}
<p>Order ID: {{ $order->id }}</p>

@endsection
