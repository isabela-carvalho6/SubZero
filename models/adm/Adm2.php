<?php

class Adm {

    private $pdo;

    public function __construct() {

        $this->pdo = new PDO('mysql:host=localhost;dbname= dev_pub', 'root', '');

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save($nome_completo, $senha) {
        
        $stmt = $this->pdo->prepare("INSERT INTO adm(nome_completo, senha) 
            VALUES (?, ?)");
        
        $stmt->execute([$nome_completo, $senha]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM adm");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByNome($nome_completo) {
        
        $stmt = $this->pdo->prepare("DELETE FROM adm WHERE nome_completo = ?");
        
        $stmt->execute([$nome_completo]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM adm WHERE id = ?");

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id,$nome_completo, $senha) {
        $stmt = $this->pdo->prepare("UPDATE adm SET nome_completo = ?, senha = ? WHERE id = ?");
        
        $stmt->execute([$nome_completo, $senha, $id]);
    }
}
