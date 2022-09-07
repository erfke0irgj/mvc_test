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

    case "/createonemore":
        include "onemore.html";
    break;

    case "/home":
        include "home.html";
    break;

    case "/singers/hatsune_miku":
        include "miku.html";
    break;

    case "/singers/inabakumori":
        include "inabakumori.html";
    break;
}