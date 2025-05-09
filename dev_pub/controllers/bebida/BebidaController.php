<?php

require_once '../models/bebida/Bebida.php';

class BebidaController {

    public function showForm() {
        include '../views/bebida/bebida_form.php';
    }

    public function saveBebida() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bebida = new Bebida();
            
            $bebida->nome = $_POST['nome'];
            $bebida->descricao = $_POST['descricao'];
            $bebida->ingredientes = $_POST['ingredientes'];
            $bebida->instrucoes = $_POST['instrucoes'];
            

            if ($bebida->save()) {
                header('Location: /dev_pub/list-bebida');
            } else {
                echo "Erro ao cadastrar a bebida.";
            }
        }
    }

    public function listBebida() {

        $bebida = new Bebida();
        $bebidas = $bebida->getAll();
        
        include '../views/bebida/bebida_list.php';
    }

    public function showUpdateForm($id_bebida) {
  
        $bebida = new Bebida();
        $bebidaInfo = $bebida->getById($id_bebida); 
        
        include '../views/bebida/update_bebida_form.php';
    }

    public function updateBebida() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bebida = new Bebida();

            $bebida->id_bebida = $_POST['id_bebida']; 
            $bebida->nome = $_POST['nome'];
            $bebida->descricao = $_POST['descricao'];
            $bebida->ingredientes = $_POST['ingredientes'];
            $bebida->instrucoes = $_POST['instrucoes'];

            if ($bar->update()) {
                header('Location: /dev_pub/list-bebida');
            } else {
                echo "Erro ao atualizar a bebida.";
            }
        }
    }

    public function deleteBebidaByNome() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bebida = new Bebida();
            
            $bebida->nome = $_POST['nome'];

            if ($bebida->deleteByNome()) {
                header('Location: /dev_pub/list-bebida');
            } else {
                echo "Erro ao excluir a bebida.";
            }
        }
    }
}
