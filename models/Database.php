<?php

class Database
{

    private string $host;
    private string $database;
    private string $username;
    private string $password;
    private $conn;


    public function __construct($host, $database, $username, $password)
    {
        $this->host = $host;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Error in connection of database") . $this->conn->connect_error;
        }
    }


    public function query($sql)
    {
        $results = $this->conn->query($sql);
        if ($results) {
            die("Error in acess sql" . $this->conn->error);
        }
        return $results;
    }

    public function close()
    {
        $this->conn->close();
    }

    public function getError()
    {
        return $this->conn->error;
    }

    public function getLastInsertedId()
    {
        return $this->conn->insert_id;
    }


}


?>