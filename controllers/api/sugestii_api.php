<?php

class sugestii_api
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
        $result = $this->userServices->retrieve_c_s($id);
        echo $result[0] . ' end ' . $result[1] . ' end ' . $result[2] . ' end ' . $result[3] . ' end ' . $result[4] . ' end ' . $result[5] . ' end ' . $result[6] . ' end ' . $result[7] . ' end ' . $result[8] . ' end ' . $result[9]. ' end ' .$result[10] . ' end ' . $result[11] . ' end ' . $result[12] . ' end ' . $result[13] . ' end ' . $result[14] . ' end ' . $result[15] . ' end ' . $result[16] . ' end ' . $result[17] . ' end ' . $result[18] . ' end ' . $result[19];
    }

    /*function post()
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
    }*/
}