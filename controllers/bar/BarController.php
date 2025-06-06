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
            $bar->latitude = $_POST['latitude'];      // <-- Adicionado
            $bar->longitude = $_POST['longitude'];    // <-- Adicionado
            $bar->senha = $_POST['senha'];

            // Pega o id do usuário logado da sessão
            if (isset($_SESSION['usuario_id'])) {
                $bar->fk_usuario_id = $_SESSION['usuario_id'];
            } else {
                $bar->fk_usuario_id = 3; // fallback para um usuário padrão
            }

            if ($bar->save()) {
                header('Location: /SubZero/public/list-bar');
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
                header('Location: /SubZero/public/list-bar');
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
                header('Location: /SubZero/public/list-bar');
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
                header('Location: /SubZero/public/list-bar');
            } else {
                echo "Erro ao excluir o bar.";
            }
        }
    }
}
