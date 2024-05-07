<?php

class Database
{
    private $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // Disable emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Disable errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Make the default fetch be an associative array
    ];

    private $connection;

    public function __construct()
    {
        // MySQL connection
        $dsn = "mysql:host=127.0.01;port=3310;dbname=myapp;charset=utf8mb4";

        try {
            $this->connection = new PDO($dsn, "laracasts", "root_root", $this->options);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function query(string $query)
    {

        $statement = $this->connection->prepare($query);

        $statement->execute();

        return $statement;
    }
}
