<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Database\Migrations\Register;
use App\Models\RegisterModel;

class RegisterController extends BaseController
{
    private $registerModel = null;
    public function __construct()
    {
        $this->registerModel = new RegisterModel();
    }


    public function index()
    {
        return view('register');
    }

    public function register()
    {

        $registerModel = new RegisterModel();



        $registerModel->transBegin();
        if (!$registerModel->insert($this->request->getPost())) {
            $this->session->setFlashData('errors', $registerModel->errors());
            return redirect()->to('register')->withInput();
        }


        $data = ($this->request->getPost());

        $registerModel->transRollBack();

        $registerModel->insert($data);


        $registerModel->transCommit();

        $this->session->setFlashData('message', "You are Register Successfully!");
        //  return redirect()->to('home');
        return view('login');
    }

    public function loginuser()
    {

        return view('login');
    }

    public function login()
    {

        $user = $this->registerModel->authenticate($this->request->getPost());
     
            // var_dump($user);
            // die;
            $session = session();
            if ($user) {
                $this->session->set('user', $user);
                $this->session->setFlashData('message', 'LoggedIn Successfully!');
                return redirect()->to('shopping');
            
        } else {

            $this->session->setFlashData('message', 'Unknown Email or Password');
            return redirect()->to('login')->withInput();
        }
    }
    public function logout()
    {
        $this->session->remove('user');
        $this->session->setFlashData('message', "LogOut Successfully!");
        return redirect()->to('login');
    }
    
}
