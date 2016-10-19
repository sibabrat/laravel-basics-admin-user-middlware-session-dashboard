<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;


class User extends Model  implements Authenticatable
{

    
//authontication auth for sign in
    use \Illuminate\Auth\Authenticatable;

    private static $_instance = null;

    protected $table='users';
    protected $hidden = [
        'password', 'remember_token',
    ];

    // for posts after log in
public function posts()
{
    return$this->hasMany('App\Post');
}


//for admin log in
    public static function getInstance()
    {
        if (!is_object(self::$_instance))  //or if( is_null(self::$_instance) ) or if( self::$_instance == null )
            self::$_instance = new User();
        return self::$_instance;
    }

///////////////////////////////////
//FOR ALL USERS FOR ADMIN MODULE

    public function getAllUsers($where, $selectedColumns = ['*'])
    {
        if (func_num_args() > 0) {
            $userid = func_get_arg(0);
//            print_r($where);
//            die;

            $result = DB::table('users')
                ->join('user_metas', 'user_metas.id', '=', 'users.id')
//                       ->where('users.id',$userid)
                ->get();

            return $result;
        } else {
            throw new Exception('Argument Not Passed');
        }
    }

//FOR STATUS USER FROM DB

    public function getActiveCategory()
    {
        try {
            $result = DB::table("users")
                ->join('user_metas', 'user_metas.id', '=', 'users.id')
                ->where('status', 'ADMIN')
                ->select()
                ->get();
        } catch (QueryException $e) {
            echo $e;
            return 0;
        }
        if ($result)
            return $result;
        else
            return 0;
    }

//////////////////////////////////
    //for joining two tables
    public function getUserDetailsById()
    {
        if (func_num_args() > 0)
        {
            $user_id = func_get_arg(0);

            $result = DB::table('users')
                ->join('user_metas', 'user_metas.id', '=', 'users.id')
                ->where('users.id', $user_id)
                ->first();
            return $result;
        }

        else
        {
            throw new Exception('Argument Not Passed');
        }
    }
    


//for users table insertion
    public function InsertUserMeta(){
        if(func_num_args()>0){

            $userData = func_get_arg(0);
            try {
                $result = DB::table("users")
                    ->insertGetId($userData);
                return $result;
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        } else {
            throw new Exception('Argument Not Passed');
        }

    }
}
