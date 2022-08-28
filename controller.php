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

    /** 2 Here it is: the save method with the user's data from form.php  */
    public static function save()
    {
        include "model.php";

        /** New class instance */
        $model = new Model();

        /** Filling all the information from the form.php to the $model identifier
         *  2 Actually just transporting the data from the Controller to the Model
         *  Easy to understand, right?
        */
        
        $model->item1 = $_POST['item1'];
        $model->item2 = $_POST['item2'];

        $model->save();

        header("Location: /list");
    }

    public static function list()
    {
        include "model.php";

        $model = new Model();
        $model->getAllRows();

        /** Showing to the user the data presented in the /list page */
        include "list.php";
    }
}