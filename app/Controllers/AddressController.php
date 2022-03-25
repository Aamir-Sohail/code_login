<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AddressModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class AddressController extends BaseController
{
    private $loginModel = NULL;
    public function __construct()
    {
        $this->loginModel = new AddressModel();
    }

    public function index()
    {
        $data = $this->loginModel->findAll();
        // var_dump($data);
        // die;
        return view('/home', ['data' => $data]);
    }

    public function address()
    {
        return view('shopping');
    }



    public function insert()
    {
        $loginModel = new AddressModel();



        $loginModel->transBegin();
        // $data = ($this->request->getPost());

        // var_dump($this->request->getPost());
        // die;
        if (!$loginModel->insert($this->request->getPost())) {
            $this->session->setFlashData('errors', $loginModel->errors());
            return redirect('shopping')->withInput();
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
        // return view('home');
        $data = $this->loginModel->findAll();
        // return view('home' ['data->']);
        return redirect('shopping', ['data' => $data]);


        var_dump($loginModel->errors());
    }

    public function delete($id)
    {

        $this->loginModel->delete($id);
        $data = $this->loginModel->findAll();
        // var_dump($data);
        // die;
        $this->session->setFlashData('message', "Address Deleted Successfully!");

        return view('/home', ['data' => $data]);
    }


    public function edit($id)
    {
        // $this->jobModel = new JobsModel();
        $user['loginModel'] = $this->loginModel->join('register', 'register.id=address.user_id')->find($id);
        var_dump($user);
        die;
        if (!$user) {
            throw PageNotFoundException::forPageNotFound('User Not Found');
        }
        $this->session->setFlashData('message', "Edit Address Successfully!");

        return view('update', $user);
    }
    public function updateJob($id)
    {
        $loginModel = new AddressModel();
        $loginModel->transBegin();

        if (!$loginModel->update($id, $this->request->getPost())) {
            $this->session->setFlashData('errors', $loginModel->errors());
            return redirect()->to('update')->withInput();
        }
        $loginModel->transCommit();

        // $data = $this->request->getPost();
        // var_dump($data); die;
        $this->session->setFlashData('message', "Address Update Successfully!");
        // return view('home');
        return redirect()->to('shopping');
        // return view('home');


    }
}
