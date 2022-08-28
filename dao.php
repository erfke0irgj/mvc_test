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

        /** Basically just making the $sql_text not a text but something to identify the bindValue lol  */
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
     *  1 To do this, we are now connecting to the Model since the user request is coming from there
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

    }
}