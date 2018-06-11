<?php

class Home extends Controller
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
            $this->view->css = array('students_home/css/reset.css','students_home/css/styles.css','students_home/css/vanillaCalendar.css');
            $this->view->js = array('students_home/js/show_hide.js','students_home/js/vanillaCalendar.js');
          }
          else if($this->user_type=='prof' || $this->user_type=='admin')
          {
            $this->view->css = array('students_home/css/reset.css','students_home/css/styles.css','students_home/css/vanillaCalendar.css');
            $this->view->js = array('students_home/js/future_events.js','students_home/js/show_hide.js','students_home/js/vanillaCalendar.js');
          }
        }

    }

    function index()
    {
      if($this->user_type=='stud')
      {
        $this->view->render('students_home/index');
      }
      else if($user_type=='prof' || $user_type=='admin')
      {
        $this->view->render('profesor_home/index');
      }
    }

}
