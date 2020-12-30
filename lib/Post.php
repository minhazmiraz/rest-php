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

    public function readSingle($id){
        $query = "SELECT 
            p.id, p.category_id, p.title, 
            c.name as category_name, 
            p.body, p.author, p.created_at
            FROM posts p
            LEFT JOIN categories c
            ON p.category_id = c.id
            WHERE p.id = :id
            ORDER BY p.created_at DESC";
        
        $this->db->query($query);
        $this->db->bind(":id", $id);
        return $this->db->single();
    }

    public function create($title,$category_id, $body, $author){
        $query = "INSERT INTO posts
                SET
                title = :title,
                category_id = :category_id,
                body = :body,
                author = :author";

        $this->db->query($query);

        $this->db->bind(":title", htmlspecialchars(strip_tags($title)));
        $this->db->bind(":category_id", htmlspecialchars(strip_tags($category_id)));
        $this->db->bind(":body", htmlspecialchars(strip_tags($body)));
        $this->db->bind(":author", htmlspecialchars(strip_tags($author)));

        return $this->db->execute();
    }

    public function update($title,$category_id, $body, $author, $id){
        $query = "UPDATE posts
                SET
                title = :title,
                category_id = :category_id,
                body = :body,
                author = :author
                WHERE id = :id";

        $this->db->query($query);

        $this->db->bind(":title", htmlspecialchars(strip_tags($title)));
        $this->db->bind(":category_id", htmlspecialchars(strip_tags($category_id)));
        $this->db->bind(":body", htmlspecialchars(strip_tags($body)));
        $this->db->bind(":author", htmlspecialchars(strip_tags($author)));
        $this->db->bind(":id", htmlspecialchars(strip_tags($id)));

        return $this->db->execute();
    }

    public function delete($id){
        $query = "DELETE FROM posts WHERE id = :id";

        $this->db->query($query);

        $this->db->bind(":id", htmlspecialchars(strip_tags($id)));

        return $this->db->execute();
    }
    
}
