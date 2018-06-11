<?php

class api extends Controller
{
    private $url = "";
    private static $version = "1.12.13";

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->url = rtrim($this->url, '/'); // Sterge ultimul '/' ca nu dea eroare
        $this->url = explode('/', $this->url);
        $this->fileExits = false;

        $method = strtolower($_SERVER['REQUEST_METHOD']);
        if (isset($this->url[1]))
        {
            $this->fileExits = true;
            $api_name = $this->url[1] . '_api';
            $file = 'controllers/api/' . $api_name . '.php';
            if (file_exists($file))
            {
                require $file; //face requst la api-ul respectiv
                $current_api = new $api_name(); // face noua clasa a api-ului
                if ($method == 'get')
                    $method = 'index';
                $current_api->{$method}(); // apeleaza metoda respectiva requestului
            }
            else
            {
                echo 'This page doesn\'t exist!';
                return;
            }
            //echo implode(" | ", $this->url);
        }
        else
        {
            $this->fileExits = true;
            if ($method == 'get')
            {
                $my_obj = array('version' => api::$version);
                echo json_encode($my_obj);
            }
            else
                echo 'Error! You need to specify the argument!';
        }
    }

    function index()
    {
        if ($this->fileExits)
            return;
        echo "cartoFII";
    }

    function post()
    {
        if ($this->fileExits)
            return;
    }

    function delete()
    {
        if ($this->fileExits)
            return;
    }

    function update()
    {
        if ($this->fileExits)
            return;
    }
}
