<?php

    require_once("src/config/App.php");

    ini_set("display_errors", 1);

    App::init();

    $Dispatcher = new Dispatcher();
    $Dispatcher->Dispatch();
