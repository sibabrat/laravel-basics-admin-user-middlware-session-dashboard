@extends('layouts.master0')


@section('title')

@section('content')

    <div class='col-lg-4 col-lg-offset-4'>

        @if ($errors->has())
            @foreach ($errors->all() as $error)
                <div class='bg-danger alert'>{{ $error }}</div>
            @endforeach
        @endif
        <form action="#" method="post">
            <h1><i class='fa fa-user'></i> Edit User</h1>

            <div class="form-group">
                <label for = "first_name">Your First Name</label>
                <input class="form-control" type="text" name="first_name" id="first_name" value="{{ $user->first_name}}">
            </div>
            <div class="form-group">
                <label for = "last_name">Your Last Name</label>
                <input class="form-control" type="text" name="last_name" id="last_name" value="{{ $user->last_name}}">
            </div>
            <div class="form-group">
                <label for = "phone">Your Phone Number</label>
                <input class="form-control" type="text" name="phone" id="phone" value="{{ $user->phone}}">
            </div>
            <div class="form-group">
                <label for = "gender">Your Gender</label>
                <input class="form-control" type="text" name="gender" id="gender" value="{{ $user->gender}}">
            </div>
            <div class="form-group">
                <label for = "email">Your E-Mail</label >
                <input class="form-control" type="text" name="gadfg" id="email" value="{{ $user->email}}">
            </div>

            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>



    </div>
