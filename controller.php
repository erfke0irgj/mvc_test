<?php

class Controller {
    public static function register()
    {
        include "register.php";
    }

    public static function list() {
        // Adquirindo os dados da model e listando todos os registros
        include "model.php";
        
        $model = new Model();
        $model-> getAllRows();

        include "list.php";
    }

    public static function save() {
        include "model.php";

        $item = new Model();
        $item->item1 = $_POST["item1"];
        $item->item2 = $_POST["item2"];
        $item-> save();

        header("Location: /list");
    }
}