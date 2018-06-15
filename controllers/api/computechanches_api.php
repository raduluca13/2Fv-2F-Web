<?php

class computechanches_api
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
        if (!Utils::requiredArguments('POST', array('id')))
            return;
        $id = $_POST['id'];
        $result = $this->userServices->computechanches($id);
        $courses_attendances = $result[0];
        $laboratories_attendances = $result[1];
        $web_events = $result[2];
        $project_situation = $result[3];
        $promovability_chance = $result[4];
        if ($id == null)
            $id = 0;
        echo $courses_attendances . " " . $laboratories_attendances . " " . $web_events . " " . $project_situation . " " . $promovability_chance;
    }
}
