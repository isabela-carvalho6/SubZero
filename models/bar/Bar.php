<?php

require_once '../config/database.php';

class Bar {

    private $conn;
    private $table_name = "bar";

 
    public $id_bar;
    public $nome_completo;
    public $email;
    public $cep;
    public $numero;
    public $endereco_completo;
    public $tipo;
    public $cidade;
    public $estado;
    public $latitude;
    public $longitude;
    public $senha;
    public $fk_usuario_id;

    

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " 
        (nome_completo, email, cep, numero, endereco_completo, tipo, cidade, estado, senha, fk_usuario_id) 
        VALUES (:nome_completo, :email, :cep, :numero, :endereco_completo, :tipo, :cidade, :estado, :senha, :fk_usuario_id)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome_completo', $this->nome_completo);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':endereco_completo', $this->endereco_completo);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':fk_usuario_id', $this->fk_usuario_id);

        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT id_bar, nome_completo, email, cep, numero, endereco_completo, tipo, cidade, estado, senha FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_bar) {

        $query = "SELECT * FROM " . $this->table_name . " WHERE id_bar = :id_bar";

        $stmt = $this->conn->prepare($query);
 
        $stmt->bindParam(':id_bar', $id_bar);
      
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function update() {
        
        $query = "UPDATE " . $this->table_name . " 
                  SET nome_completo = :nome_completo, email = :email, cep = :cep, numero = :numero, endereco_completo = :endereco_completo, tipo = :tipo, cidade = :cidade, estado = :estado, senha = :senha
                  WHERE id_bar = :id_bar";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':nome_completo', $this->nome_completo);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':cep', $this->cep);
        $stmt->bindParam(':numero', $this->numero);
        $stmt->bindParam(':endereco_completo', $this->endereco_completo);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':cidade', $this->cidade);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id_bar', $this->id_bar);


        return $stmt->execute();
    }


    public function deleteByNome() {
     
        $query = "DELETE FROM " . $this->table_name . " WHERE nome_completo = :nome_completo";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_completo', $this->nome_completo);

        return $stmt->execute();
    }

    public function deleteById($id_bar) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_bar = :id_bar";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_bar', $id_bar);
        return $stmt->execute();
    }
}
