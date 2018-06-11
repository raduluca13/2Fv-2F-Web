<?php

class register_api
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
        if (!Utils::requiredArguments('POST', array('username', 'password', 'firstname','lastname','githubAccount','facebookAccount','gender')))
            return;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $githubAccount = $_POST['githubAccount'];
        $facebookAccount = $_POST['facebookAccount'];
        $gender = $_POST['gender'];
        $result = $this->userServices->register($username, $password, $firstname, $lastname,$githubAccount,$facebookAccount,$gender);
        echo json_encode($result);
    }
}
