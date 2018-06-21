<?php

class Index extends Controller
{
    function __construct()
    {
        parent::__construct();
        Utils::IsUserLogged(true);
        if(Utils::UserGetId()==1){
            header('Location: /login');
        }
    }

    function index()
    {
      if(!Utils::IsUserLogged(false)) header('Location: /login');
      else header('Location: /home');
    }
}
?>
