<?php

require_once '../models/bar/Bar.php';

class BarController {

    public function showForm() {
        include '../views/bar/bar_form.php';
    }

    public function saveBar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bar = new Bar();
            $bar->nome_completo = $_POST['nome_completo'];
            $bar->email = $_POST['email'];
            $bar->cep = $_POST['cep'];
            $bar->numero = $_POST['numero'];
            $bar->tipo = $_POST['tipo'];
            $bar->senha = $_POST['senha'];

            // Defina aqui o ID de um usuário que exista na tabela usuario
            $bar->fk_usuario_id = 12; // Use o id do usuário cadastrado

            if ($bar->save()) {
                header('Location: /dev_pub/list-bar');
            } else {
                echo "Erro ao cadastrar o bar.";
            }
        }
    }

    public function listBar() {

        $bar = new Bar();
        $bares = $bar->getAll();
        
        include '../views/bar/bar_list.php';
    }

    public function showUpdateForm($id) {
  
        $bar = new Bar();
        $barInfo = $bar->getById($id); 
        
        include '../views/bar/update_bar_form.php';
    }

    public function updateBar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bar = new Bar();

            $bar->id_bar = $_POST['id_bar'];
            $bar->nome_completo = $_POST['nome_completo'];
            $bar->email = $_POST['email'];
            $bar->cep = $_POST['cep'];
            $bar->numero = $_POST['numero'];
            $bar->tipo = $_POST['tipo'];
            $bar->senha = $_POST['senha'];

            if ($bar->update()) {
                header('Location: /dev_pub/list-bar');
            } else {
                echo "Erro ao atualizar o bar.";
            }
        }
    }

    public function deleteBarByNome() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bar = new Bar();
            $bar->nome_completo = $_POST['nome_completo']; // O campo do formulário deve se chamar 'nome_completo'

            if ($bar->deleteByNome()) {
                header('Location: /dev_pub/list-bar');
            } else {
                echo "Erro ao excluir o bar.";
            }
        }
    }
    public function deleteBarById() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bar = new Bar();
            $id_bar = $_POST['id_bar'];
            if ($bar->deleteById($id_bar)) {
                header('Location: /dev_pub/list-bar');
            } else {
                echo "Erro ao excluir o bar.";
            }
        }
    }
}
