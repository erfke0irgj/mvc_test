<?php

class DAO
{
    private $connection;

    public function __construct()
    {
        /** data source name */
        $dsn = "mysql:host=127.0.0.1:3306;dbname=db_mvc";

        /** Wanna keep the mysql user information (php data objects) in something.
         *  Not a new $connection identifier but a CLASS PROPERTY. So $this->connection
         */
        $this->connection = new PDO($dsn, "root", "1234");
    }

    public function insert(Model $model)
    {
        $sql_text = "INSERT INTO info (item1, item2) values (?, ?)";

        /** Basically just making the $sql_text not a text but something to make the bindValue be identified lol 
         *  We use for the first time the $sql_text
        */
        $statement = $this->connection->prepare($sql_text);
        /** bindValue has its position in each ? from the values of $sql_text */
        $statement->bindValue(1, $model->item1);
        $statement->bindValue(2, $model->item2);

        /** Once the interrogation values are replaced by item1 and item2, we do execute 
         *  4 and FINALLY insert the data into the database
        */
        $statement->execute();        
    }

    /** Getting all the data presentation in the database.
     *  1 To do this, we are now sending the data to the Model since we need to connect to the Controller, then present all in the View
     *  function getAllRows(). Model::getAllRows()
    */
    public function select()
    {
        $sql_text = "SELECT * from info";

        $statement = $this->connection->prepare($sql_text);
        $statement->execute();

        /** You get all the data through the fetchAll method. Not in a text type but in a form of objects
         * PDO::FETCH_CLASS
         * This is a RETURN. It's a value. Then you are gonna keep those return values in $rows
        */
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function update($model)
    {
        $sql_text = "UPDATE info SET item1=?, item2=? where id=?";

        $statement = $this->connection->prepare($sql_text);
        $statement->bindValue(1, $model->item1);
        $statement->bindValue(2, $model->item2);
        $statement->bindValue(3, $model->id);

        $statement->execute();
    }

    public function delete(int $id)
    {
        $sql_text = "DELETE FROM info where id = ?";

        $statement = $this->connection->prepare($sql_text);
        $statement->bindValue(1, $id);

        $statement->execute();
    }

    public function selectById(int $id)
    {
        include_once "model.php";
        $sql_text = "SELECT * from info where id = ?";

        $statement = $this->connection->prepare($sql_text);
        $statement->bindValue(1, $id);

        $statement->execute();

        /** Getting the $model value */
        return $statement->fetchObject("Model");
    }
}