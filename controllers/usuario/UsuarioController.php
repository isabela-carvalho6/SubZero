<?php

require_once '../models/usuario/Usuario.php';

class UsuarioController {

    public function showForm() {
        include '../views/usuario/usuario_form.php';
    }

    public function saveUsuario() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $usuario->nome_completo = $_POST['nome_completo'];
            $usuario->cpf = $_POST['cpf'];
            $usuario->email = $_POST['email'];
            $usuario->senha = $_POST['senha'];

            try {
                if ($usuario->save()) {
                    include '../VIEWS/usuario/cadastro_sucesso.php';
                    exit;
                } else {
                    echo "Erro ao cadastrar usuário.";
                }
            } catch (Exception $e) {
                echo "Erro ao cadastrar usuário: " . $e->getMessage();
            }
        }
    }

    public function listUsuario() {

        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        
        include '../views/usuario/usuario_list.php';
    }

    public function showUpdateForm($id) {
  
        $usuario = new Usuario();
        $usuarioInfo = $usuario->getById($id); 
        
        include '../views/usuario/update_usuario_form.php';
    }

    public function updateUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();

            $usuario->id = $_POST['id']; 
            $usuario->nome_completo = $_POST['nome_completo'];
            $usuario->cpf = $_POST['cpf'];
            $usuario->email = $_POST['email'];
            $usuario->senha = $_POST['senha'];

            if ($usuario->update()) {
                header('Location: /SubZero/public/list-usuario');
            } else {
                echo "Erro ao atualizar o usuário.";
            }
        }
    }

    public function deleteUsuarioByNome() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            
            $usuario->nome = $_POST['nome_completo'];

            if ($usuario->deleteByNome()) {
                header('Location: /SubZero/public/list-usuario');
            } else {
                echo "Erro ao excluir o usuário.";
            }
        }
    }
    public function deleteUsuarioById() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            $id = $_POST['id'];
            if ($usuario->deleteById($id)) {
                header('Location: /SubZero/public/list-usuario');
            } else {
                echo "Erro ao excluir o usuário.";
            }
        }
    }
}
