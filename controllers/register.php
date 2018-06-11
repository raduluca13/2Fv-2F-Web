<?php

class Register extends Controller
{
    function __construct()
    {
        parent::__construct();

        $this->view->css = array('login/css/index.css');
        $this->view->js = array('register/js/register.js');
    }

    function index()
    {
        $this->view->render('register/index');
    }

}
