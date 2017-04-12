<?php

    require_once("src/config/App.php");

    ini_set("display_errors", 1);

    App::ini();

    $Dispatcher = new Dispatcher();
    $Dispatcher->Dispatcher();
