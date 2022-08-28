<?php

class DAO {
    private $connection;

    function __construct()
    {
        $dsn = "mysql:host=127.0.0.1:3307;dbname=db_mvc";
        $this->connection = new PDO($dsn, "root", "1234");
    }

    function insert(Model $model) {
        $sql = "INSERT INTO db_mvc (item1, item2)
        values (?, ?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, $model->item1);
        $stmt->bindValue(2, $model->item2);
        $stmt->execute();
    }

    public function select() {
        $sql = "SELECT * FROM testtb";

        $stmt = $this->connection->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}