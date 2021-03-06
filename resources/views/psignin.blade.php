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
                    padding-left: px;
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

                p2
                {

                    color: white;
                }



            </style>


        <form action="p_signin" method="post">
            <h3>User Sign In</h3>

            <div class="form-group">
                <label for = "email"><p2>Your E-Mail</p2></label>
                <input class="form-control" type="text" name="email" id="email" value="{{ old('email')}}">
            </div>
            <div class="form-group">
                <label for = "password"><p2>Your Password</p2></label>
                <input class="form-control" type="text" name="password" id="password" value="{{ old('password')}}">
            </div>

            <label class="mdl-chechkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                <input type="checkbox" id="checkbox-2" class="mdl-checkbox_input" name="remember"/>
                <span class="'mdl-checkbox_label">Remember</span>
            </label>

            <ul class="nav navbar-nav navbar-right">

</ul>

            <button type="submit" class="btn btn-primary">Sign In</button>
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>
@endsection
