<?php

function loggedIn()
{

    $user = session()->get('user');
    if ($user and $user['isLoggedIn']) {
        return true;
    }
    return false;
}
function allowEdit($user_id)

{
    // var_dump($user_id);
    // die;
    $user = session()->get('user');
    //   var_dump($user_id);
    //  die;
    if ($user['user_id'] === $user_id)
    // if($id===$id)
    {
        return true;
    }
    return false;
}
