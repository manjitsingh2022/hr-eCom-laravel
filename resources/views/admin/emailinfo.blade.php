@extends('admin.home')

@section('style')
<style type="text/css">
.color-input {
  color: black;
}
    .container-scroller {
        padding: 20px;
        justify-content: center;
    }

    label {
        display: inline-block;
        font-size: 15px;
        width: 200px;
        font-weight: bold;
    }

    .form-group {
        display: flex;
    }

    .form-group label {
        display: flex;
        align-items: center;
    }

    .form-group input,
    .form-group textarea {
        flex: 1;
    }

    .email-highlight {
        color: red;
        background-color: yellow;
        font-weight: 500;
           }


</style>
@endsection

@section('content')

@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    {{ session()->get('message') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h1>Send Email to <span class="email-highlight">{{$order->email}}</span></h1>
<div class="container-scroller">
    <form action="{{route('senduseremail',$order->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="greeting">Greeting:</label>
            <div class="input-group">
                <input type="text" class="form-control color-input" name="greeting" id="greeting" placeholder="Enter the greeting" required>
            </div>
        </div>
        <div class="form-group">
            <label for="emailFirstLing">Email FirstLing:</label>
            <div class="input-group">
                <input type="text" class="form-control color-input"name="firstline" id="emailFirstLing" placeholder="Enter the Email FirstLing." required>
            </div>
        </div>
        <div class="form-group">
            <label for="emailBody">Email Body:</label>
            <div class="input-group">
                <textarea class="form-control color-input"  name='body' id="emailBody" rows="5" placeholder="Enter the email body" required></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="buttonName">Button Name:</label>
            <div class="input-group">
                <input type="text" class="form-control color-input" name="button" id="buttonName" placeholder="Enter the button name" required>
            </div>
        </div>
        <div class="form-group">
            <label for="buttonURL">Button URL:</label>
            <div class="input-group">
                <input type="url" class="form-control color-input" name="url" id="buttonURL" placeholder="Enter the button URL" required>
            </div>
        </div>
        <div class="form-group">
            <label for="lastLine">Last Line:</label>
            <div class="input-group">
                <input type="text" class="form-control color-input" name="lastline" id="lastLine" placeholder="Enter the last line" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Send Email</button>
    </form>
</div>
@endsection
