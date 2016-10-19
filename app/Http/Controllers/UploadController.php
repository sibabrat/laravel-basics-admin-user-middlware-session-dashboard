<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;


use Guzzle\Tests\Plugin\Redirect;
use App\Image;

use Illuminate\Support\Facades\Input;
use DB;

use App\Http\Requests;
use Symfony\Component\HttpKernel\Client;

class UploadController extends Controller
{
    public function upload()
    {
        return view('imageupload');
    }

    public function dbUpload(Request $request)
    {
        $image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'

        ]);
        $image->title = $request->title;
        $image->description = $request->description;
        if ($request->hasFile('image')) {
            $file = Input::file('image');
           // dd($file);
            $name =  $file->getClientOriginalName();
            $size =  $file->getClientsize();
          // $size =  $file->getClientmimeType();

            $image->filePath = $name;$image->size = $size;
            $file->move(public_path() . '/images/', $name , $size);
            $message = 'welcome you have succesfully uploaded image file !';
        }
        $image->save();
        return redirect()->back()->with(['message' => $message]);

    }

    public function show()
    {

        $images = DB::table('files')->paginate(5);
       
        return view('showLists', compact('images'));

    }




public  function testCurl(Request $request)
{

   // $postData=['name'=>'dina','number'=>10];

//        dd(json_encode($postData));

    $cSession = curl_init();
//step2
    curl_setopt($cSession,CURLOPT_URL,'http://localhost.test-curl.com');
    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($cSession,CURLOPT_HEADER, false);
    //  curl_setopt($cSession,CURLOPT_POSTFIELDS,'username=pupun@gmail.com&Password=pupun1234');
    curl_setopt($cSession,CURLOPT_POSTFIELDS,'email=sibabrat111@gmail.com&password=asdf1234');
//step3
    $result=curl_exec($cSession);
//step4
    curl_close($cSession);
//step5
    echo $result;





//        $response=json_decode($buffer);

//        echo  $response->name;
    //dd($buffer);


//        echo  $response->name;
   // dd($buffer);


}






}

