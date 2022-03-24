<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\True_;

class RegisterModel extends Model
{

    protected $primaryKey = "id";
    protected $table = "register";
    protected $DBGroup = "default";
    protected $allowedFields = [
       'name','username','email','password','confirm_password','address','number'
    ];
    protected $useTimestamps = false; 
    protected $validationRules = [
        'name'=> 'required',
        'username'=> 'required',
        'email'=> 'required',
        'password'=> 'required',
        'address'=> 'required',
        'number'=> 'required',
    ];
    protected $validationMessages = [];
    protected $beforeInsert = ['hashpassword'];

    public function transBegin()
    {

        return $this->db->transBegin();
    }


    public function transRollBack()
    {
        return $this->db->transRollback();
    }

    public function transCommit()
    {
        return $this->db->transCommit();
    }
    public function hashPassword($data){        
        // var_dump($data);
        // die;
       $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
       return $data; 
    }

    public function authenticate($user)
    {
    
        $password = $user['password'];
        $email = $user['email'];
        $user = $this->getWhere(['email'=>$user['email'],'password' => $user['password']]);
        if ($user->resultID->num_rows > 0) {
            $user = $user->getRow();
            $verfiy = password_verify($password , $user->password);

            $verfiy = $password;
            if ($verfiy) {
                return $user;
            } else {
                return false;
            }
        }
        return false;
    }
   
}
