<?php

namespace App\Http\Controllers;
use App\Post;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller
{

    public function UserDashboard()
    {
        //fetch all posts
        $posts = Post::all();

        //echo '<pre>';
        //print_r($posts);
       //die;
        return view('userdashboard',['posts' => $posts]);

    }

    public  function aboutUser($user_id){

        $posts = Post::find($user_id);
        $user = User::find($user_id);


        return view('about_user', [ 'user' => $user ] );


    }
    
    public function CreatPost(Request $request)
    {
      
        $this->validate($request, [
            'body'=>'required|max:1000'
        ]);

        $post = new Post();
        $post->body = $request['body'];
        $message = 'There was an error!!!';

        if($request->User()->posts()->save($post))
        {
            
            
            $message='Post created succesfully!';
        }

        return redirect()->route('/user/dashboard')->with(['message'=> $message]);

    }

    //delete a post
    public function DeletePost($post_id) // we want the id to delete
    {
        // to get a single post
        $post = Post::where('id' ,$post_id)->first();
        $post->delete();
        return redirect()->route('/user/dashboard')->with(['message'=> 'Succesfully deleted!']);

    }
    
}

