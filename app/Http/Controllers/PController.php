<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;

use App\User_Meta;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;


class PController extends Controller
{

    public function loginPage(){

        if((session('user_id')))
        {
            return redirect()->intended('/user/dashboard');
            //; return view ('admin/dashboard');
        }
        else {
            return view('psignin');
        }
    }



    public function Profile()
  {

      return view('profile');
  }
    

    public function P_signup(Request $request)
    {
        //validations
        $this->validate($request, [
            'first_name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'phone' => 'required|max:60',
            'gender' => 'required|max:60',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4'

        ]);
        $userData['first_name'] = $request['first_name'];
        $userData['last_name'] = $request['last_name'];
        $userData['phone'] = $request['phone'];
        $userData['gender'] = $request['gender'];


        $objModeltest = new User_Meta();  //model name
        $result = $objModeltest->insertData($userData);
        //print_r($result);
        //die;
    

        if ($result) {
            $userMetaData['id'] = $result;

         //validations
            $this->validate($request,[
                'email' => 'required',
                'password' => 'required'
            ]);

            //taking value from form and storing in array
            $userMetaData['email'] = $request->input("email");
           // $userMetaData['password'] = bcrypt($request['password']);
            $userMetaData['password'] = Hash::make($request['password']);


            $userMetaData['first_name'] = $request['first_name'];
            $userMetaData['last_name'] = $request['last_name'];
            $userMetaData['gender'] = $request['gender'];
            $userMetaData['phone'] = $request['phone'];

            $userMetaData['roll'] = '0';
            $userMetaData['status'] = 'USER';
            $message = 'There was an error!!!';

            //fetch data from user model
            if($objModelUserMeta = new User())
                $result1 = $objModelUserMeta->InsertUserMeta($userMetaData);

            return redirect()->route('/profile/signup');

           //return Redirect('/profile/signup')->with(['msg' => 'sucessfully signed up .']);
            //print_r($result1);
            //die();
            // if ($usermetaDetails) {//   return redirect()->intended('/login')  //} else {  //  return view("User/Views/user/login")->withErrors([   //    'registerErrMsg' => 'Something went wrong, please try again.',

                   //]); //}
        }
    }
    
    
     public function signin_afterSignup()
    {

        return redirect('psignin');
    }



//sign in project 1
    public function P_signin(Request $request)
    {
                 //validation for input log in form
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);
        
        
//taking input request and storing in a variable
        $email = $request['email'];
        $password = $request['password'];
        $message = 'There was an error!!!';
        // die;
        $rem = $request->input('remember');
        if (Auth::attempt(['email' => $email, 'password' => $password] , $rem)) {


            $objModelUserMeta = User::getInstance();
            $userDetails = $objModelUserMeta->getUserDetailsById(Auth::id());

            $sessionName='user';
            $sessionName = $userDetails->id;
            session(['user_id'=>$sessionName]);
            $sessionData = (session('user_id'));


           // print_r($sessionData);die;
           // $sessionName = 'user';
           // $sessionName = $userDetails->id;
          //  session(['key'=>$sessionName]);
           // $sessionData = (session('key'));
            //print_r($sessionData);die;

            //$userDetails = User::all();
            //die("me");
            //$userDetails = $objModelUserMeta->getUserById(Auth::id());
            //echo '<pre>';
            //print_r($userDetails);
            //die;
            $message='welcome you have succesfully signed in !';

            return redirect()->route('/user/dashboard')->with(['message'=> $message]);
           // return view('userdashboard');
        }
        else
        {
            echo "you have entered  wrong password or login id";

        }

//            return redirect()->back();
    }

    //log out user
            

}

