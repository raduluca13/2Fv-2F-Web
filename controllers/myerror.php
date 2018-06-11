<?php

class MyError extends Controller
{
    function __construct($error = 'This page doesn\'t exist')
    {
        parent::__construct();
        $this->view->css = array('error/css/error.css');
        $this->index();
    }

    function index()
    {
        $this->view->render('error/index');
    }
}
