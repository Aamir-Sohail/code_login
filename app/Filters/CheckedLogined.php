<?php

namespace App\Filters;


use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface as HTTPRequestInterface;
use CodeIgniter\HTTP\ResponseInterface as HTTPResponseInterface;

class CheckedLogined implements FilterInterface
{

    public function before(HTTPRequestInterface $request, $arguments = null)
    {
        $user = session()->get('user');

        if (!$user or !$user['isLoggedIn']) {
            session()->setFlashData('message', 'You are Not LoggedIn');
            return redirect()->to('/login');
        }
    }

    public function after(HTTPRequestInterface $request, HTTPResponseInterface $response, $arguments = null)
    {
      
    }
}
