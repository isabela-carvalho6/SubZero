<?php

class Feedback {

    private $pdo;

    public function __construct() {

        $this->pdo = new PDO('mysql:host=localhost;dbname= dev_pub', 'root', '');

        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function save($titulo, $descricao, $data_feedback) {
        
        $stmt = $this->pdo->prepare("INSERT INTO feedback(titulo, descricao, data_feedback) 
            VALUES (?, ?)");
        
        $stmt->execute([$titulo, $descricao, $data_feedback]);
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM feedback");
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteByTitulo($titulo) {
        
        $stmt = $this->pdo->prepare("DELETE FROM feedback WHERE titulo = ?");
        
        $stmt->execute([$titulo]);
    }

    public function getById($id_feedback) {
        $stmt = $this->pdo->prepare("SELECT * FROM feedback WHERE id_feedback = ?");

        $stmt->execute([$id_feedback]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_feedback,$titulo, $descricao, $data_feedback) {
        $stmt = $this->pdo->prepare("UPDATE feedback SET titulo = ?, descricao = ?, data_feedback = ? WHERE id_feedback = ?");
        
        $stmt->execute([$titulo, $descricao, $data_feedback, $id_feedback]);
    }
}
