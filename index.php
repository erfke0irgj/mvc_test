<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include "controller.php";

switch($uri_parse) {
    case "/form":
        Controller::form();
    break;

    case "/save":
        Controller::save();
    break;

    case "/list":
        Controller::list();
        echo "bruh bruh bruh";
    break;
}