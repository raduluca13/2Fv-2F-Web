<?php

class users_api
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
        $result = $this->userServices->isAdmin($mail);
        echo json_encode($result);
    }

    function post()
    {
        if (!Utils::requiredArguments('POST', array('username','password')))
            return;
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->userServices->login($username, $password);
        $id = $result[0];
        $user_type = $result[1];
        $github_account = $result[2];
        if ($id == null)
            $id = 0;
        echo $result[0] . ' ' . $result[1] . ' ' . $result[2];
    }
}
