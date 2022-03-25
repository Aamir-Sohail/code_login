<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GusetFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $user = session()->get('user');
        session()->getFlashData('message', 'You are Already Login');
        return redirect()->to('/shopping');
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
