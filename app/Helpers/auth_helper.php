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
if($user['id']===$id)
// if($id===$id)
{
    return true;
}
    return false;

}



