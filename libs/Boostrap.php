<?php

class Boostrap
{
    function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/'); // Sterge ultimul '/' ca nu dea eroare
        $url = explode('/', $url);

        $method = $_SERVER['REQUEST_METHOD'];

        if (empty($url[0])) //no selected page
        {
            if ($method != 'GET')
            {
                require 'controllers/myerror.php';
                $controller = new MyError('Current page doen\'t allow that request!');
                return false;
            }
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            echo "am ajuns aici2";
            return false;
        }

        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file))
            require $file;
        else
        {
            require 'controllers/myerror.php';
            $controller = new MyError();
            return false;
        }

        $controller = new $url[0];
        switch ($method)
        {
            case 'GET':
                if (method_exists($controller, 'index'))
                    $controller->index();
                else
                {
                    require 'controllers/myerror.php';
                    $controller = new MyError('Current page doesn\'t allow that request!');
                    return false;
                }
                break;
            case 'POST' || 'DELETE' || 'PUT':
                if ($method == 'PUT')
                    $method = 'UPDATE';
                if (method_exists($controller, strtolower($method)))
                    $controller->{strtolower($method)}();
                else
                {
                    require 'controllers/myerror.php';
                    $controller = new MyError('Current page doesn\'t allow that request!');
                    return false;
                }
                break;
            default:
                require 'controllers/myerror.php';
                $controller = new MyError('Current page doesn\'t allow that request!');
                return false;
        }

        return true;
    }
}
?>
