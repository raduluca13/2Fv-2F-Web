<!doctype html>
<html lang="ro">
<head>
    <title>My WEB way!</title>
    <meta name="keywords" content="TW web chance promote events "/>
    <meta charset="UTF-8">
    <meta name="author" content="Cretu Marius Valentin Gheorghita,Iftimesei Ioan,Luca Radu">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/public/css/default.css"/>
    <script type="application/javascript" src="/public/js/utils.js"></script>
    <?php
    if (isset($this->js))
        foreach ($this->js as $js)
            echo '<script type="text/javascript" src="' . URL . 'views/' . $js . '"></script>';
    if (isset($this->css))
        foreach ($this->css as $css)
            echo '<link rel="stylesheet" href="' . URL . 'views/' . $css . '"/>';
    ?>
</head>
<body>
