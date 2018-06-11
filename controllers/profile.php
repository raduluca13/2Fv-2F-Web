<?php

class Profile extends Controller
{
    function __construct()
    {
        parent::__construct();
        Utils::IsUserLogged(true);
        if(Utils::UserGetId()==1){
            header('Location: /login');
        }
        $this->view->css = array('profile/css/index.css');
        $this->view->js = array('profile/js/profile.js');
    }

    function index()
    {
        $this->view->render('profile/index');
    }
}
