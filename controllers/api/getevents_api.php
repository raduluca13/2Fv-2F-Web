<?php

class getevents_api
{
    public function __construct()
    {
        $this->userServices = new User_Services();
    }

    function index()
    {
      $result = $this->userServices->getevents();
      $str = "";
      foreach ($result as $aux)
        $str=$str.$aux.'#!#';
      echo $str;
    }

    function post()
    {
    }
}
