<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
include "controller.php";

switch($url)
{
    case "/create":
        Controller::form();
    break;

    case "/save":
        Controller::save();
    break;

    case "/list":
        Controller::list();
    break;

    case "/delete":
        Controller::delete();
    break;

    case "/added":
        Controller::veryfirst();
    break;

    case "/home":
        include "home.html";
    break;
}