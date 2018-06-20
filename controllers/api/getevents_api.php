<?php

class getevents_api
{
    public function __construct()
    {
        $this->userServices = new User_Services();
    }

    function index()
    {
      if (!Utils::requiredArguments('GET', array('id')))
            return;
        $id = $_GET['id'];
      $result = $this->userServices->getevents($id);
      $str = "";
      foreach ($result as $aux)
        $str=$str.$aux.'#!#';
      echo $str;
    }

     function post()
    {
        if (!Utils::requiredArguments('POST', array('e_id','s_id','valid_key')))
            return;
        $e_id = $_POST['e_id'];
        $s_id = $_POST['s_id'];
        $valid_key = $_POST['valid_key'];
        $result = $this->userServices->check_event($e_id, $s_id, $valid_key);
        echo json_encode($result);
    }
}
