<?php

require_once '../config/database.php';

class Usuario {

    private $conn;
    private $table_name = "usuario";

 
    public $id;
    public $nome_completo;
    public $cpf;
    public $email;
    public $senha;
    

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " (nome_completo, cpf, email, senha) 
                  VALUES (:nome_completo, :cpf, :email, :senha)";
 
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome_completo', $this->nome_completo);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {

        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";

        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(':id', $id);
      
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function update() {
        
        $query = "UPDATE " . $this->table_name . " 
                  SET nome_completo = :nome_completo, cpf = :cpf, email = :email, senha = :senha
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome_completo', $this->nome_completo);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id', $this->id);


        return $stmt->execute();
    }


    public function deleteByNome() {
     
        $query = "DELETE FROM " . $this->table_name . " WHERE nome_completo = :nome_completo";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_completo', $this->nome_completo);

        return $stmt->execute();
    }
}
