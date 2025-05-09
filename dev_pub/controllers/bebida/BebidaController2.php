<?php

require_once '../models/bebida/Bebida.php';

class BebidaController {

    public function showForm() {
        require '../views/bebida/bebida_form.php';
    }

    public function saveBebida() {
        $bebida->nome = $_POST['nome'];
        $bebida->descricao = $_POST['descricao'];
        $bebida->ingredientes = $_POST['ingredientes'];
        $bebida->instrucoes = $_POST['instrucoes'];
        

        $bebida = new Bebida();
        $bebida->save($nome, $descricao, $ingredientes, $instrucoes);

        header('Location: /dev_pub/list-bebida');
    }

    public function listBebida() {
        $bebida = new Bebida();
        $bebidas = $bebida->getAll(); 

        require '../views/bebida/bebida_list.php';
    }

    public function deleteBebidaByNome() {
        $bebida = $_POST['bebida'];  

        $bebida = new Bebida();
        $bebida->deleteByNome($bebida); 

        header('Location: /dev_pub/list-bebida');
    }

    public function showUpdateForm($id_bebida) {
        $bebida = new Bebida();
        $bebidaInfo = $bebida->getById($id_bebida); 

        require '../views/bebida/update_bebida_form.php';
    }

    public function updateBebida() {
        $id_bebida = $_POST['id_bebida'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $ingredientes = $_POST['ingredientes'];
        $instrucoes = $_POST['instrucoes'];

        $bebida = new Bebida();
        $bebida->update($id_bebida, $nome, $descricao, $ingredientes, $instrucoes);

        header('Location: /dev_pub/list-bebida');
    }
}
