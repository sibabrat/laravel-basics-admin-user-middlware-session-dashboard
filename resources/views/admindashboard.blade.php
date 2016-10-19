@extends('layouts.master0')
)

@section('title') Admin Dashboard @stop

@section('content')




<body>
<div class="col-lg-10 col-lg-offset-1">

    <h1><i class="fa fa-users"></i> User Administration <a href="/logout" class="btn btn-default pull-right">Logout</a></h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped" border="1">

            <thead>
            <tr>
                <th>S/N</th>
                <th>  <em> First Name   </em></th>
                <th><em>Last Name</em></th>
                <th><em>Phone</em></th>
                <th><em>Gender</em></th>
                <th><em>Email</em></th>
                <th><em>Roll</em></th>
                <th><em>Status</em></th>



            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)

                <tr>
                    <td> i  </td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roll }}</td>
                    <td>{{ $user->status }}</td>

                    <td>
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>



                        <a href="/user/{{ $user->id }}/delete" class="btn btn-danger pull-right" style="margin-right: 3px;">Delete</a>
                    </td>

                </tr>


            @endforeach
            </tbody>


        </table>



        {{$users->links()}}

    </div>

    <a href="/user/add" class="btn btn-success">Add User</a>

</div>


@stop