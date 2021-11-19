<?php

    //Establecer errores

    //ini_set('display_errors', 'On');

    session_start();

    //access .env
    require 'vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv -> load();

    $_SESSION['nav']=['home'];
    require 'config.php';

    require 'lib/conn.php';
    require 'src/router.php';
    
    //require 'render.php'

    //Get controller
    
    $controller = getRoute();

    require APP.'/src/controllers/'.$controller.'.php';