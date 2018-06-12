<?php

class profile_api
{
    public function __construct()
    {
        $this->userServices = new User_Services();
    }

    function index() //GET
    {
        if (!Utils::requiredArguments('GET', array('id')))
            return;
        $id = $_GET['id'];
        $result = $this->userServices->retrieve_profile_info($id);
        echo $result[0] . ' ' . $result[1] . ' ' . $result[2] . ' ' . $result[3] . ' ' . $result[4];
    }

    function post()
    {
        if (!Utils::requiredArguments('POST', array('id','firstName', 'lastName', 'gitHub', 'faceBook', 'password')))
            return;
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $github = $_POST['gitHub'];
        $facebook = $_POST['faceBook'];
        $password = $_POST['password'];
        $result = $this->userServices->profile($id, $firstName, $lastName, $github, $facebook, $password);
        echo json_encode($result);
    }
}
