<?php

class Feedback {

    private $pdo;

    public function __construct() {

        $this->pdo = new PDO('mysql:host=localhost;dbname= dev_pub', 'root', '');

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save($nome_completo, $cpf, $email, $senha) {
        
        $stmt = $this->pdo->prepare("INSERT INTO usuario(nome_completo, cpf, email, senha) 
            VALUES (?, ?)");
        
        $stmt->execute([$nome_completo, $cpf, $email, $senha]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM usuario");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByNome($nome_completo) {
        
        $stmt = $this->pdo->prepare("DELETE FROM usuario WHERE nome_completo = ?");
        
        $stmt->execute([$nome_completo]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE id = ?");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id,$nome_completo, $cpf, $email, $senha) {
        $stmt = $this->pdo->prepare("UPDATE usuario SET nome_completo = ?, cpf = ?, email = ?, senha = ? WHERE id = ?");
        
        $stmt->execute([$nome_completo, $cpf, $email, $senha, $id]);
    }
}
