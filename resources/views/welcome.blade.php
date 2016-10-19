

@extends('layouts.master2')

@section('title')
   laravel
@endsection

@section('content')

    @endsection
<html xmlns="http://www.w3.org/1999/html">
    <head>


        


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">

    </head>
    <body>

<style>
    body {
        background-image: url("image1.jpg");
        padding-left: 70px;
        padding-right: 70px;;
        padding-bottom: 100px;
        padding-top: 60px;
    }
</style>

        <div class="shit">

            <div class="content">

                <div class="title"><p><font color="white">My First Laravel Project</font></div>

                <a type="button"  href="/psignup" class="btn btn-primary">User SignUp</a>
                <a type="button" href="psignin" class="btn btn-info">User SignIn</a>
                <a type="button" href="adminlogin" class="btn btn-warning">Admin Sign In</a>

            </div>
        </div>

    </body>

</html>
