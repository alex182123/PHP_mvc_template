<?php

class DbConection
{
    private $DB_NAME = "bd_name";
    private $DB_USERNAME = "username";
    private $DB_PASSWORD = "password";
    private $DB_HOST = "host";
    private $conn;

    private function startConnection()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->DB_HOST . ";dbname=" . $this->DB_NAME, $this->DB_USERNAME, $this->DB_PASSWORD);
            // Set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    private function closeConection()
    {
        $this->conn = null;
    }
    public function getQuery($sql)
    {
        $this->startConnection();
        $stmt = $this->conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->closeConection();
        return $results; // Return the result for further processing
    }

    public function setQuery($sql)
    {
        // This function is for make post o put in the db
        // @sql is for the query that you want to make an put or a post
        $this->startConnection();
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            $this->closeConection();
            return true;
        } else {
            $this->closeConection();
            return false;
        }
    }
}
