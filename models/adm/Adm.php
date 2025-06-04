<?php

require_once '../config/database.php';

class Adm {

    private $conn;
    private $table_name = "adm";

    public $id;
    public $nome_completo;
    public $senha;
    public $id_adm;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function save() {
        $query = "INSERT INTO " . $this->table_name . " (nome_completo, senha)
                  VALUES (:nome_completo, :senha)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_completo', $this->nome_completo);
        $stmt->bindParam(':senha', $this->senha);
        return $stmt->execute();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id_adm) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_adm = :id_adm";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_adm', $id_adm);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE adm SET nome_completo = :nome_completo, senha = :senha WHERE id_adm = :id_adm";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_completo', $this->nome_completo);
        $stmt->bindParam(':senha', $this->senha);
        $stmt->bindParam(':id_adm', $this->id_adm);
        return $stmt->execute();
    }

    public function deleteByNome() {
        $query = "DELETE FROM " . $this->table_name . " WHERE nome_completo = :nome_completo";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome_completo', $this->nome_completo);
        return $stmt->execute();
    }
}
