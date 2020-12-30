<?php

class Post extends Database {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function read(){
        $query = "SELECT 
            c.name as category_name, 
            p.id, p.category_id, p.title, 
            p.body, p.author, p.created_at
            FROM posts p
            LEFT JOIN categories c
            ON p.category_id = c.id
            ORDER BY p.created_at DESC";
        
        $this->db->query($query);
        return $this->db->resultSet();
    }
    
}
