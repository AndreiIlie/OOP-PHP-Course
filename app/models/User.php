<?php

class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function findUserByUsername($username) {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        // Check row

        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function register($data) {
        if(empty($data['username']) || empty($data['password']))
            return false;
        $this->db->query('INSERT INTO users (username, password) VALUES (:username, :password)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');
        $this->db->bind(':username', $username);
        $row = $this->db->single();
        $hashedPw = $row->password;
        if(password_verify($password, $hashedPw)) {
            return $row;
        } else {
            return false;
        }
        
    }
}


?>