<?php

class Database {
    // Take values from config.php
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbName = DB_NAME;

    private $dbh; // Will hold the PDO object.
    private $stmt; // Will hold the statement that's about to be executed.
    private $error; // Will hold errors should they exist.

    public function __construct() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;  // Create data source name (mysql:host=?;dbname=?)
        $options = array(
            PDO::ATTR_PERSISTENT => true, // Make the connection persistent. Optimizes future calls.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // Make exceptions appear.
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // query($sql) - takes in the raw sql, prepares it and saves it in $stmt.
        // Arguments: $sql - raw sql
        // Returns: nothing
    public function query($sql) {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // bind($param, $value, $type = null) - binds a dynamic value in the previously set statement
        // Arguments: $param - name of the value
        //            $value - value to be bound
        //            $type - type of the value. If left empty, attempt to auto-detect it. DEFAULT: null.
        // Returns: nothing
    public function bind($param, $value, $type = null) {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    // execute() - executed previously set statement.
        // Arguments: none
        // Returns: statement result
    public function execute() {
        return $this->stmt->execute();
    }

    // execute() - executed previously set statement and return an object containing all the results.
        // Arguments: none
        // Returns: object of results
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // execute() - executed previously set statement. and return an object containing a single result.
        // Arguments: none
        // Returns: object of result
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // execute() - get the number of results for the previously set statement
        // Arguments: none
        // Returns: number of results for the previously set statement
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}

?>