<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class User_Meta extends Model
{

    protected $table='user_metas';
    protected $hidden = [
        'password', 'remember_token',
    ];

    //for user_metas table
    public function insertData(){

        if(func_num_args()>0){

            $userData = func_get_arg(0);
            try {
                $result = DB::table("user_metas")
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
