<?php

namespace App\Models;


use CodeIgniter\Model;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class AddressModel extends Model
{
    protected $primaryKey = "id";
    protected $table = "address";
    protected $DBGroup = "default";
    protected $allowedFields = [
       'address','country','city','postel_code','created_at','user_id'
    ];
    protected $useTimestamps = false;
    protected $validationRules = [

        'address'=> 'required',
        'country'=> 'required',
        'city'=> 'required',
        'postel_code'=> 'required',
    ];
    protected $validationMessages = [];

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
}
