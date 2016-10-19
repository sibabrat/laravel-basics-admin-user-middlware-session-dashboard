@extends('layouts.master3')

@section('title')
    User Sign up
@endsection

@section('content')

    @include('includes.message-block')


    <div class="col-md-6">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>

        body
        {
            background-image: url("image1.jpg");
            background-repeat: no-repeat;
            padding-left:px;
            padding-right:px;
            padding-top: px;
            padding-down: px;
        }

        h3
        {
            color: blue;
        }

        p1
        {
            color: red;
        }




    </style>




    <form action="p_signup" method="post">
        <h3>User Sign Up</h3>

        <div class="form-group">
            <label for = "first_name">Your First Name</label>
            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name')}}">
        </div>
        <div class="form-group">
            <label for = "last_name">Your Last Name</label>
            <input class="form-control" type="text" name="last_name" id="last_name"   value="{{ old('last_name')}}" >
        </div>
        <div class="form-group">
            <label for = "phone">Your Phone Number</label>
            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone')}}" >
        </div>
        <div class="form-group">
            <label for = "gender">Your Gender</label>
            <input class="form-control" type="text" name="gender" id="gender"  value="{{ old('gender')}}" >
        </div>
        <div class="form-group">
            <label for = "email">Your E-Mail</label>
            <input class="form-control" type="text" name="email" id="email" value="{{ old('email')}}"  >
        </div>
        <div class="form-group">
            <label for = "password">Your Password</label>
            <input class="form-control" type="text" name="password" id="password"  value="{{ old('password')}}" >
        </div>

        <button type="submit" class="btn btn-primary">Creat A New Account </button>
        <input type="hidden" name="_token" value="{{Session::token()}}">
    </form>
</div>
@endsection

