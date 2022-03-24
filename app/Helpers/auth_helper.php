<?php

function loggedIn()
{

    $user = session()-> get('user');
    if ($user and $user ['isLoggedIn']){
        return true;

    }
    return false;
}
function allowEdit($id)
{
    $user = session()->get('user');
    //   var_dump($user);
    //  die;
if($id['username']===$id)
{
    return true;
}
    return false;

}



