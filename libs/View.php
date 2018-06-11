<?php

class View
{
    public function __construct()
    {
        //echo 'this is the view' . '<br />';
    }


    public function render($name, $noInclude = false)
    {
        if ($noInclude)
        {
            require 'views/' . $name . '.php';
        } else
        {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }
}
?>
