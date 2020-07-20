<?php

class Post {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllPosts() {
        $this->db->query('SELECT *,
                            posts.id as postId,
                            users.id as userId,
                            posts.created_at as postCreatedAt,
                            users.created_at as userCreatedAt
                            FROM posts
                            INNER JOIN users
                            ON posts.user_id = users.id
                            ORDER BY posts.created_at DESC');
        return $this->db->resultSet();
    }

    public function getPostsByUserId($userId) {
        $this->db->query('SELECT * FROM posts WHERE user_id = :userId');
        $this->db->bind(':userId', $userId);

        $result = $this->db->resultSet();

        return $result;
    }

    public function addPost($data) {
        $this->db->query('INSERT INTO posts (title, body, user_id) VALUES (:title, :body, :userId)');
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':userId', $data['user_id']);
        return $this->db->execute();
    }

    
}


?>