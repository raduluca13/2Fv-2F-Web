<?php
class Sugestii extends Controller
{
    private $user_type = null;
    function __construct()
    {
        parent::__construct();
        if(Utils::IsUserLogged(true))
        {
          $this->user_type=Utils::UserGetType();
          if($this->user_type=='stud')
          {
            $this->view->css = array('sugestii/css/reset.css','sugestii/css/styles.css','sugestii/css/sugestii.css');
            $this->view->js = array('sugestii/js/future_events.js','sugestii/js/show-hide.js');
          }
        }
    }
    function index()
    {
      if($this->user_type=='stud')
      {
        $this->view->render('sugestii/index');
      }
      
    }
}
