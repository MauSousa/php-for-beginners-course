<?php

declare(strict_types=1);

class Database
{
    private $options = [
        PDO::ATTR_EMULATE_PREPARES   => true, // Disable emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Disable errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Make the default fetch be an associative array
    ];

    private $connection;

    public function __construct(array $config, string $username = 'laracasts', string $password = 'root_root')
    {

        // MySQL connection
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->connection = new PDO($dsn, $username, $password, $this->options);
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }

    public function query(string $query, array $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}
