<?php

class Catalog extends Controller{
	public function __construct(){
		parent::__construct();
		if(Utils::IsUserLogged(true)){
      $this->user_type=Utils::UserGetType();
      if($this->user_type=='stud')
      {
        $this->view->css = array('catalog/css/reset.css','catalog/css/styles.css','catalog/css/catalog.css');
        $this->view->js = array('public/js/utils.js','catalog/js/catalog.js','login/js/login.js');
      }
      else if($this->user_type=='prof' || $this->user_type=='admin')
      {
        $this->view->css = array('catalog/css/reset.css','catalog/css/styles.css','catalog/css/catalog.css');
        $this->view->js = array('public/js/utils.js','login/js/login.js','catalog/js/catalog.js');
      }
    }
	}

	public function index(){
    if(isset($_GET['id'])){
      $this->view->render('<h1>BIG.</h1>',true);
    }
    else{
      $this->user_type=Utils::UserGetType();
      if($this->user_type=='stud'){
        $this->view->render('catalog/stud');
      }else if($this->user_type=='prof' || $this->user_type=='admin'){
          $this->view->render('catalog/index');
      }
    }
      
  }
}