<?php

/** Controller handles the request from the user and tells to Model what to do with the request
 *  Therefore this section worries about getting a failure or success of the entire request flow
 *  if (success) then View1.php else View2.php 
*/

class Controller {
    public static function form()
    {
        include "form.php";
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