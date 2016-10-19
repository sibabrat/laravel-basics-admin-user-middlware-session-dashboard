<?php

namespace App\Http\Controllers;

use App\User_Meta;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use DB;

use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Helper\TableSeparator;
use Symfony\Component\Console\Input\Input;


class AdminController extends Controller
{


public function adminPage(){

    if((session('admin_id')))
{
    return redirect()->intended('/admin/dashboard');
   //; return view ('admin/dashboard');
}
    else {
        return view('adminlogin');
    }
}

    public function dashboard(Request $data)
    {

        $users=DB::table('users')->get();
       $users = DB::table('users')->paginate(5);
       return View::make('/admindashboard', ['users' => $users]);

        //$users = User::all();


//GET ALL DATA THE USERS FOR ADMIN
        $objUsersModel = User::getInstance();
        $where['rawQuery'] = 1;
        $Allusers = $objUsersModel->getAllUsers($where);
        $totalUsers = count($Allusers);

//GET ALL DATA BY INDIVIDUAL
        $objCategory = new User();
        $result2 = $objCategory->getActiveCategory();
        $totalCategory = count($result2);

         // echo '<pre>';
          //print_r($result2);
         //die;
        //die("me");
       //return view('/admindashboard');

    }

    public function Admin_Login(Request $request)
    {


            $this->validate($request, [
                'email' => 'required',
                'password' => 'required'
            ]);

            $userData['email'] = $request['email'];
            $userData['password'] = $request['password'];
            $userData['roll'] = '1';
            $userData['status'] = 'A';
            //print_r($userData);
            //die;
            $remember = $request->input('remember_me');



        if (Auth::attempt(['email' => $userData['email'], 'password' => $userData['password']],$remember ))
        {

            $objModelUserMeta = User::getInstance();
            $userDetails = $objModelUserMeta->getUserDetailsById(Auth::id());


            //$posts = User::all();

           // echo '<pre>';
            // $posts = User::all();
           // print_r($userDetails);
            //print_r($posts);
           //die;

            if ($userDetails->roll == 1)
            {

                //Session::put($sessionName, $userData['original']);
                //Session::put($sessionName, $userDetails['original']);

                $sessionName='user';
                $sessionName = $userDetails->id;
                session(['admin_id'=>$sessionName]);
                $sessionData = (session('admin_id'));


                //echo "you have been successfully logged in <br>";
                //return redirect('/admin/dashboard');      // echo '<pre>';       //print_r($userDetails);
             return redirect()->route('/admin/dashboard');
            }
                 else
                    {
                      return redirect()->intended('/psignin');
                    }


            }
        else

            {
                echo "password or login id are wrong";

            }


        }


    public function Logout()

    {

        $objModelUserMeta = User::getInstance();
        $userDetails = $objModelUserMeta->getUserDetailsById(Auth::id());

        if ($userDetails->roll == 0)
        {
            Session::flush('user');
            return redirect('psignin');
        }

        elseif ($userDetails->roll == 1)
        {
            Session::flush('user');
            return redirect('adminlogin');
        }
        elseif ($userDetails==null){

        }
    }
//NEW USER ADD BY ADMIN
public function userAdd(){


    return view('addnewuser');
}
//NEW USER ADDING BY ADMIN
    public function newUser(Request $request)
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
            $this->validate($request, [
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
            if ($objModelUserMeta = new User())
                $result1 = $objModelUserMeta->InsertUserMeta($userMetaData);


                return redirect()->route('/admin/dashboard');

        }

    }
    public function delete($id){

        $user = User::find($id);

        //echo '<pre>';print_r($user);die;
        if ($user->roll == 0) {
            User::destroy($id);
            User_Meta::destroy($id);
            return Redirect::to('/admin/dashboard');
        }
        else{
            return Redirect::to('/admin/dashboard');
        }
    }






    public function edit($id)
    {

        $user = User::find($id);
        return View::make('edit_user_data', [ 'user' => $user ]);


    }


    public  function editedData($id,Request $request){


        $user = User::find($id);

        $user->first_name = \Illuminate\Support\Facades\Input::get('first_name');
        $user->last_name  = \Illuminate\Support\Facades\Input::get('last_name');
        $user->phone   = \Illuminate\Support\Facades\Input::get('phone');
        $user->gender      = \Illuminate\Support\Facades\Input::get('gender');
        $user->email      = \Illuminate\Support\Facades\Input::get('email');


        print_r( $user->first_name);
        print_r( $user->last_name);
        print_r( $user->phone);
        print_r( $user->gender);
        print_r( $user->email);

        $user->save();


        return Redirect::to('/admin/dashboard');


    }

}
