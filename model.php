<?php

/** Model handles the data logic (validating, saving, updating, deleting)
 * Interacts with the database through DAO (it just cares about interacting with the data lol)
 * Sends the data to the Controller
*/

class Model {
    public $id, $name, $age, $height, $weight, $pronouns, $nationality, $desc;

    /** Wanna keep the data presentation in rows. We must create a new identifier to make the data be presented
     *  in those rows
     */
    public $rows;

    // The data from the user is going to be saved in mysql database
    public function save()
    {
        // Once DAO file is included we keep the interaction between the Model and the database through DAO
        include "dao.php";

        // new DAO instance
        $dao = new DAO();

        // If the id is empty on DAO, so insert them
        if(empty($this->id))
        {
            /** All the information from $model to the $dao identifier
            *  3 Transporting the data from Model to DAO
            */
            $dao->insert($this);
        }
        else {
            // filled information on form ($model) is gonna be updated if $this->id already exists in DAO
            $dao->update($this);
        }
    }

    // function getAllRows() in Model
    public function getAllRows()
    {
        include "dao.php";
        
        $dao = new DAO();

        // 2 Keeping the return value (from FETCH_ALL) in $rows identifier. So it receives the select() method with the objects from DAO */
        $this->rows = $dao->select();
    }

    // getById function 
    public function getById(int $id)
    {
        include "dao.php";
        $dao = new DAO();

        // Storing the $object with the selectById() from DAO
        $object = $dao->selectById($id);
        // $object is $statement->fetchObject("Model");
        // in form of object

        if($object){ return $object;} // if $dao->selectById($id) actually exists and its not false, it returns the same
        else {return new Model();} // if not, an entire new empty Model instance is created :>
    }

    // delete($id) from DAO
    public function delete(int $id)
    {
        include "dao.php";

        $dao = new DAO();

        $dao->delete($id);
    }
}