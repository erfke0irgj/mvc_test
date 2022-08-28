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

        /** If the received data from Controller is empty, so insert them */
        if(empty($this->id))
        {
            /** All the information from $model to the $dao identifier
            *  3 Transporting the data from Model to DAO
            */
            $dao->insert($this);
        }
        else {
            $dao->update($this);
        }
    }

    //** function getAllRows() in Model */
    public function getAllRows()
    {
        include "dao.php";
        
        $dao = new DAO();

        /** 2 Keeping the return value (from FETCH_ALL) in $rows identifier. So it receives the select() method with the objects from DAO */
        $this->rows = $dao->select();
    }

    /** getById function  */
    /** Storing the $object with the  */
    public function getById(int $id)
    {
        include "dao.php";
        $dao = new DAO();

        $object = $dao->selectById($id);

        /** If $object is not false, return the same. If its, its gonna happen a new Model */
        if($object){ return $object;}
        else {return new Model(); }
    }

    /** delete($id) from DAO */
    public function delete(int $id)
    {
        include "dao.php";

        $dao = new DAO();

        $dao->delete($id);
    }
}