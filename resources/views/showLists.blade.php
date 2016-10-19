<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>

<h1 class="well well-lg">All Image List</h1>
@foreach( $images as $image )



        <a href="{!! '/images/'.$image->filePath !!}">
           <ul>

               <li>
                   {{$image->filePath}}

                   <div class="row" style="margin-left: 15px">
                         <img src="{!! '/images/'.$image->filePath !!}" alt="" width="50" height="50" >
                   </div>
               </li>

            </ul>
        </a>




@endforeach
{{$images->links()}}
</body>
</html>