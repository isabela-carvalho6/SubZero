<?php

class Bar {

    private $pdo;

    public function __construct() {

        $this->pdo = new PDO('mysql:host=localhost;dbname= dev_pub', 'root', '');

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save($nome_completo, $email, $cep, $numero, $tipo,  $senha) {
        
        $stmt = $this->pdo->prepare("INSERT INTO bar(nome_completo, email, cep, numero, tipo, senha) 
            VALUES (?, ?)");
        
        $stmt->execute([$nome_completo, $email, $cep, $numero, $tipo, $senha]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM bar");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByNome($nome_completo) {
        
        $stmt = $this->pdo->prepare("DELETE FROM bar WHERE nome_completo = ?");
        
        $stmt->execute([$nome_completo]);
    }

    public function getById($id_bar) {
        $stmt = $this->pdo->prepare("SELECT * FROM bar WHERE id_bar = ?");

        $stmt->execute([$id_bar]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_bar,$nome_completo, $email, $cep, $numero, $tipo, $senha) {
        $stmt = $this->pdo->prepare("UPDATE bar SET nome_completo = ?, email = ?, cep = ?, numero = ?, tipo = ?, senha = ? WHERE id_bar = ?");
        
        $stmt->execute([$nome_completo, $email, $cep, $numero, $tipo, $senha, $id_bar]);
    }
}
