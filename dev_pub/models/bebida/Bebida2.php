<?php

class Bebida {

    private $pdo;

    public function __construct() {

        $this->pdo = new PDO('mysql:host=localhost;dbname= dev_pub', 'root', '');

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save($nome, $descricao, $ingredientes, $instrucoes) {
        
        $stmt = $this->pdo->prepare("INSERT INTO bebida(nome, descricao, ingredientes, instrucoes) 
            VALUES (?, ?)");
        
        $stmt->execute([$nome, $descricao, $ingredientes, $instrucoes]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM bebida");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByNome($nome) {
        
        $stmt = $this->pdo->prepare("DELETE FROM bebida WHERE nome = ?");
        
        $stmt->execute([$nome]);
    }

    public function getById($id_bebida) {
        $stmt = $this->pdo->prepare("SELECT * FROM bebida WHERE id_bebida = ?");

        $stmt->execute([$id_bebida]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_bebida,$nome, $descricao, $ingredientes, $instrucoes) {
        $stmt = $this->pdo->prepare("UPDATE bebida SET nome = ?, descricao = ?, ingredientes = ?, instrucoes = ? WHERE id_bebida = ?");
        
        $stmt->execute([$nome, $descricao, $ingredientes, $instrucoes, $id_bebida]);
    }
}
