<?php

class Category extends Database {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function read(){
        $query = "SELECT c.id, c.name FROM categories c ORDER BY c.name ASC";
        
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function readSingle($id){
        $query = "SELECT c.id, c.name FROM categories c WHERE c.id = :id ORDER BY c.name ASC";
        
        $this->db->query($query);
        $this->db->bind(":id", htmlspecialchars(strip_tags($id)));
        return $this->db->single();
    }

    public function create($title){
        $query = "INSERT INTO categories
                SET
                name = :title";

        $this->db->query($query);

        $this->db->bind(":title", htmlspecialchars(strip_tags($title)));
        
        return $this->db->execute();
    }

    public function update($title, $id){
        $query = "UPDATE categories
                SET
                name = :title
                WHERE id = :id";

        $this->db->query($query);

        $this->db->bind(":title", htmlspecialchars(strip_tags($title)));
        $this->db->bind(":id", htmlspecialchars(strip_tags($id)));

        return $this->db->execute();
    }

    public function delete($id){
        $query = "DELETE FROM categories WHERE id = :id";

        $this->db->query($query);

        $this->db->bind(":id", htmlspecialchars(strip_tags($id)));

        return $this->db->execute();
    }
    
}
