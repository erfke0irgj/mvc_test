<?php

/** Model handles the data logic (validating, saving, updating, deleting)
 * Interacts with the database through DAO (it just cares about interacting with the data lol)
 * Sends the data to the Controller
*/

class Model {
    public $id, $item1, $item2;

    /** Wanna keep the data presentation in rows. We must create a new identifier to make the data be presented
     *  in those rows
     */
    public $rows;

    /** The data from the user is going to be saved in mysql database */
    public function save()
    {
        /** Once DAO file is included we keep the interaction between the Model and the database through DAO */
        include "dao.php";

        $dao = new DAO();

        /** All the information from $model to the $dao identifier
         *  3 Transporting the data from Model to DAO
         */
        $dao->insert($this);
    }

    //** function getAllRows() in Model */
    public function getAllRows() {
        include "dao.php";
        
        $dao = new DAO();

        /** 2 Keeping the return value (from FETCH_ALL) in $rows identifier. So it does receive the select() method from DAO */
        $this->rows = $dao->select();
    }
}