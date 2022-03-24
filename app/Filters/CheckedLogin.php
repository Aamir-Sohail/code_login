<?php namespace App\Filters\FilterInterface;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;



class CheckedLogin implements FilterInterface{
    
    public function before(RequestInterface $request, $arguments = null){
        $user =session()->get('user');
    
            if (!$user or !$user['isLoggedIn']){
            session()->setFlashData('message','You are Not LoggedIn');
            return redirect()->to('/  login');
            }
        }
   
    
    

    public function after(RequestInterface $request,  $arguments = null);

} 