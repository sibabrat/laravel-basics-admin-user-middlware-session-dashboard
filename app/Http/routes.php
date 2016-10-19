<?php
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/laravel',function ()
{
return Redirect::to('http://www.laravel.com');
});

Route::get('/google',function ()
{
    return Redirect::to('http://www.google.com');
});

Route::get('/bootstrap',function ()
{
    return Redirect::to('http://www.getbootstrap.com/');
});


Route::resource('upload', 'UploadController@upload');
Route::resource('/upload/image', 'UploadController@dbUpload');
Route::get('showLists', 'UploadController@show' );


//sign up by me
Route::group(['middleware' =>['web']],function()
{
    Route::get('/sign_up', function () {
        return view('lsign_up');
    });

    Route::post('/profile',[
        'uses' => 'UserController@postSignUp',
    'as' => 'profile'
    ]);

    Route::post('/signin',[
        'uses' => 'UserController@SignIn',
        'as' => 'signin'
    ]);
});

//demo prject my own
Route::get('/dsignup', function () {
    return view('dsignup');
});
Route::resource('/dprofile', 'DemoController@DProfile');










//project 1 user sign up
Route::get('/psignup', function () {
        return view('psignup');
    });
Route::resource('/p_signup', 'PController@P_signup');

//project 1 user sign in
Route::get('/psignin', function () {
        return view('psignin');
    })->name('home');

Route::get('/psignin', [
    'uses' => 'PController@loginPage',
    'as' => 'psignin',

]);

Route::resource('/p_signin', 'PController@P_signin');

// for log out user
Route::get('/logout', [
    'uses' => 'AdminController@Logout',
    'as' => 'logout',

]);
//Route::get('/user/dashboard', function () { //  return view('userdashboard'); //});


Route::group(['middleware' =>['web']],function() {
// after sign up user comes to this
    Route::get('/profile/signup', [
        'uses' => 'PController@Profile',
        'as' => '/profile/signup',
    ]);
//after log in user comes to the page
    Route::get('/user/dashboard', [
        'uses' => 'PostController@UserDashboard',
        'as' => '/user/dashboard',
        'middleware' => 'auth'
    ]);
});

// creat post connection

Route::post('/user/creatpost', [
    'uses' => 'PostController@CreatPost',
    'as' => '/creat_post',

]);
// post delete

Route::get('/post/delete{post_id}', [
    'uses' => 'PostController@DeletePost',
    'as' => '/post/delete',

]);


// user gets his data
Route::get('/about', [
    'uses' => 'PController@about',
    'as' => 'about',
]);
Route::resource('/about/{user_id}/user',  'PostController@aboutUser');


//after sign up go to login
Route::get('/profile/signin', [
    'uses' => 'PController@signin_afterSignup',
    'as' => '/profile/signin',

]);

//Route::get('/user/dashboard', 'PController@UserDashboard');



//addmin log in


Route::get('/adminlogin', [
    'uses' => 'AdminController@adminPage',
    'as' => '/adminlogin',
])->name('homeadmin');


Route::resource('/admin/login',  'AdminController@Admin_Login');


Route::get('/admin/dashboard', [
    'uses' => 'AdminController@dashboard',
    'as' => '/admin/dashboard',
    'middleware' => 'auth'


]);


Route::resource('/user/add',  'AdminController@userAdd');
Route::resource('/new/user',  'AdminController@newUser');
Route::resource('/user/{id}/edit',  'AdminController@edit');
Route::resource('/user/{id}/delete',  'AdminController@delete');
Route::resource('/user/{id}/edited_data',  'AdminController@editedData');























//extra
Route::get('/connect.php ', function () {
    return view('connect');
});

Route::get('welcome', function () {
     echo "welcome to my site";
});

Route::get('hello/{name}', function ($name) {
    echo  'Welcome There' . "<br>". $name ;
});




// CREAT AN ITEM
Route::post('test', function () {
   echo "POST" ;
});
// read an item
Route::get('test', function () {
    echo '<form method = "POST" action = "test">';
    echo '<input type = "submit">';
    echo '<input type="hidden" value="PUT" name="_method">';
     echo '</form>';
});
//UPDATE AN ITEM
Route::put('test',function () {
    echo "PUT";
});
// delete an item
Route::delete('test', function () {
    echo ('DELETE');
});

Route::get('curl', function () {
   return view('curl');
});


Route::resource('test-curl', 'UploadController@testCurl');

