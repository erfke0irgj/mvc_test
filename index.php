<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include "controller.php";

switch($uri_parse) {
    case "/register":
        Controller::register();
    break;

    case "/save":
        Controller::save();
    break;

    case "/list":
        Controller::list();
    break;
}