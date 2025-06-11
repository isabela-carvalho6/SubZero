<?php

require_once '../config/database.php';

class Bebida {

    private $conn;
    private $table_name = "bebida";

 
    public $id_bebida;
    public $nome;
    public $descricao;
    public $ingredientes;
    public $instrucoes;
    public $usuario_id; // em vez de fk_usuario_id

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " (nome, descricao, ingredientes, instrucoes, usuario_id) 
                  VALUES (:nome, :descricao, :ingredientes, :instrucoes, :usuario_id)";
 
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':instrucoes', $this->instrucoes);
        $stmt->bindParam(':usuario_id', $this->usuario_id);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_bebida) {

        $query = "SELECT * FROM " . $this->table_name . " WHERE id_bebida = :id_bebida";

        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(':id_bebida', $id_bebida);
      
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function update() {
        
        $query = "UPDATE " . $this->table_name . " 
                  SET nome= :nome, descricao = :descricao, ingredientes = :ingredientes, instrucoes = :instrucoes
                  WHERE id_bebida = :id_bebida";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':ingredientes', $this->ingredientes);
        $stmt->bindParam(':instrucoes', $this->instrucoes);
        $stmt->bindParam(':id_bebida', $this->id_bebida);


        return $stmt->execute();
    }


    public function deleteByNome() {
     
        $query = "DELETE FROM " . $this->table_name . " WHERE nome = :nome";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);

        return $stmt->execute();
    }
}

