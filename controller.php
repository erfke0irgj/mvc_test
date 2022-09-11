<?php

/** Controller handles the request from the user and tells to Model what to do with the request
 *  Therefore this section worries about getting a failure or success of the entire request flow
 *  if (success) then View1.php else View2.php 
*/

class Controller {
    public static function form()
    {
        include "model.php";

        $model = new Model();

        // If there is the id, so its gonna happen the getById
        if(isset($_GET['id']))
        // // Filling the Model with the gotten information from getById() and specified id ($_GET['id'])
        
            $model = $model->getById((int) $_GET['id']);

        // var_dump($model);
        include "create.html";
    }

    // 2 Here it is: the save method with the user's data from form.php
    public static function save()
    {
        include "model.php";

        // var_dump($_POST);
        // exit;

        // New class instance
        $model = new Model();

        /** Filling all the information from the form.php to the $model identifier
         *  2 Actually just transporting the data from the Controller to the Model
         *  Easy to understand, right?
        */
        
        $model->id = $_POST['id'];
        $model->name = $_POST['name'];
        $model->age = $_POST['age'];
        $model->height = $_POST['height'];
        $model->weight = $_POST['weight'];
        $model->pronouns = $_POST['pronouns'];
        $model->nationality = $_POST['nationality'];
        $model->desc = $_POST['desc'];

        $model->save();

        header("Location: /added");
    }

    public static function list()
    {
        include "model.php";

        $model = new Model();
        $model->getAllRows();

        // Showing to the user the data presented in the /list page
        include "list.html";
    }

    public static function delete()
    {
        include "model.php";

        $model = new Model();
        $model->delete((int) $_GET['id']);

        header("Location: /list");
    }

    public static function veryfirst()
    {
        include "model.php";

        $model = new Model();
        $model->getAllRows();

        include "added.html";
    }
}