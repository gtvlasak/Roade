<?php

//Remember to include database.php in all classes of similar structure, else $pdo will not be available.

class User {
    // Private properties.
    private $conn;

    // DB access function.
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
    }

    // Query to list all users
    public function get_users() {
        return $this->conn->query("SELECT username, usermail FROM user")->fetchAll();
    }
}