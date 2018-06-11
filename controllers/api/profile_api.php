<?php

class profile_api
{
    public function __construct()
    {
        $this->userServices = new User_Services();
    }

    function index()
    {
        if (!Utils::requiredArguments('GET', array('mail')))
            return;
        $mail = $_GET['mail'];
        $result = $this->userServices->mailExists($mail);
        echo json_encode($result);
    }

    function post()
    {
        if (!Utils::requiredArguments('POST', array('firstName', 'lastName', 'gitHub', 'faceBook', 'password')))
            return;
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $github = $_POST['gitHub'];
        $facebook = $_POST['faceBook'];
        $password = $_POST['password'];
        $result = $this->userServices->profile($firstName, $lastName, $github, $facebook, $password);
        echo json_encode($result);
    }
}
