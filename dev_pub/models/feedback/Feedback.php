<?php

require_once '../config/database.php';

class Feedback {

    private $conn;
    private $table_name = "feedback";

 
    public $id_feedback;
    public $titulo;
    public $descricao;
    public $data_feedback;
    

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " (titulo, descricao, data_feedback) 
                  VALUES (:titulo, :descricao, :data_feedback)";
 
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':data_feedback', $this->data_feedback);
        
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_feedback) {

        $query = "SELECT * FROM " . $this->table_name . " WHERE id_feedback = :id_feedback";

        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(':id_feedback', $id_feedback);
      
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function update() {
        
        $query = "UPDATE " . $this->table_name . " 
                  SET titulo= :titulo, descricao = :descricao, data_feedback = :data_feedback
                  WHERE id_feedback = :id_feedback";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':data_feedback', $this->data_feedback);
        $stmt->bindParam(':id_bebida', $this->id_bebida);


        return $stmt->execute();
    }


    public function deleteByTitulo() {
     
        $query = "DELETE FROM " . $this->table_name . " WHERE titulo = :titulo";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titulo', $this->titulo);

        return $stmt->execute();
    }
}
