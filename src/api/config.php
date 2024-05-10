<?php

namespace App\Database;

use PDO;

/**
 * Database Connection
 */
class DbConnect
{
    private $server = 'localhost';
    private $dbname = 'test_tasks';
    private $user = 'root';
    private $pass = '';

    /**
     * Connects to the database using PDO.
     * @return PDO|null The PDO connection object or null on failure.
     * @error handle exception error
     */
    public function connect()
    {
        try {
            $conn = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->dbname, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\Exception $e) {
            echo "Database Error: " . $e->getMessage();
            return null;
        }
    }
}
