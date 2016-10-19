<!DOCTYPE html>
<html>
<head>
    @include('includes.message-block')

    <meta charset="UTF-8">
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{URL::to('src/css/main.css')}}">

</head>
<body>
<div>
<h1 class="well well-lg">Upload Image</h1>

</div>
    <div class="container">
    @if(isset($success))
        <div class="alert alert-success"> {{$success}} </div>
    @endif
        <form action="/upload/image" method="post" enctype="multipart/form-data">
            <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
        <div class="form-group">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::textarea('description', null, ['class'=>'form-control', 'rows'=>5] ) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Choose an image') !!}
            {!! Form::file('image') !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', array( 'class'=>'btn btn-danger form-control' )) !!}
            <a type="button" href="showLists" class="btn btn-success" style="margin-top: 8px">Show Lists</a>

        </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
</form>
        {!! Form::close() !!}
        <div class="alert-warning">
            @foreach( $errors->all() as $error )
                <br> {{ $error }}
            @endforeach
        </div>
</div>
</body>
</html>