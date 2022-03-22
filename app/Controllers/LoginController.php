<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class LoginController extends BaseController
{
    private $loginModel = NULL;
    public function __construct()
    {
        $this->loginModel = new LoginModel();
    }

    public function index()
    {
        $data = $this->loginModel->findAll();
        // var_dump($data);
        // die;
        return view('view', ['data' => $data]);
    }

    public function address()
    {
        return view('shopping');
        }




    public function insert()
    {
        $loginModel = new LoginModel();



        $loginModel->transBegin();
        if (!$loginModel->insert($this->request->getPost())) {
            $this->session->setFlashData('errors', $loginModel->errors());
            return view('shopping');
        }

        //     $data = [
        //                 'address' => $this->request->getPost('address'),
        //                 'country' => $this->request->getPost('country'),
        //                 'city' => $this->request->getPost('city'),   
        //                 'postel_code' => $this->request->getPost('postel_code'),               

        // ];
        $data = ($this->request->getPost());

        $loginModel->transRollBack();

        $loginModel->insert($data);
        // var_dump($data);
        // die;

        $loginModel->transCommit();

        $this->session->setFlashData('message', "Shopping Done Successfully!");
        //  return redirect()->to('home');
        return redirect('/view');


        var_dump($loginModel->errors());
    }

    public function delete($id)
    {

        $this->loginModel->delete($id);
        $data = $this->loginModel->findAll();
        // var_dump($data);
        // die;
        $this->session->setFlashData('message', "Address Deleted Successfully!");

        return view('/view', ['data' => $data]);
    }


    public function edit($id = null)
    {
        // $this->jobModel = new JobsModel();
        $data['loginModel'] = $this->loginModel->find($id);
        $this->session->setFlashData('message', "Edit Address Successfully!");

        return view('update', $data);
    }
    public function updateJob($id)
    {
        $loginModel = new loginModel();
        $loginModel->transBegin();
        if (!$loginModel->update($id, $this->request->getPost())) {
            $this->session->setFlashData('errors', $loginModel->errors());
            return redirect()->to('update')->withInput();
        }
        $loginModel->transCommit();
        $data = ($this->request->getPost());

        $this->session->setFlashData('message', "Address Update Successfully!");
        // return view('home', $data);
        return redirect()->to('/');
    }
}
