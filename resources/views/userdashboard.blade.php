@extends('layouts.master')

@section('title')
    User Dashboard
@endsection

@section('content')
    @include('includes.message-block')

    <section class="row new-post">
        <div class="col-mod-6 col-md-offset-3">

            <header><h3>what do you have to say  </h3></header>
            <form action="creatpost" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post"  rows="5" placeholder="your post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Creat a Post</button>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>
    </section>
        <section class="row posts">
            <div class="col-md-6 col-md-offset-3">
                <header><h3>what other people say...</h3></header>

                @foreach($posts as $post)


                    <article class="post">
                        <p> {{$post->body }}</p>
                        <div class="info">
                            Posted  on {{$post->created_at }}
                        </div>
                        <div class="interaction">
                            <a href="#">Like</a>
                            <a href="#">Dislike</a>
                            <a href="#">Edit</a>
                            <a href="{{ route('/post/delete',['post_id' => $post->id]) }}">Delete</a>
                        </div>
                    </article>

                @endforeach

            </div>
        </section>
    <head>
        <style>




            </style>
    </head>

    @endsection
