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
            

            if ($usuario->save()) {
                header('Location: /dev_pub/list-usuario');
            } else {
                echo "Erro ao cadastrar usuário.";
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

            if ($bar->update()) {
                header('Location: /dev_pub/list-usuario');
            } else {
                echo "Erro ao atualizar o usuário.";
            }
        }
    }

    public function deleteUsuarioByNome() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario();
            
            $usuario->nome_completo = $_POST['nome_completo'];

            if ($usuario->deleteByNome()) {
                header('Location: /dev_pub/list-usuario');
            } else {
                echo "Erro ao excluir o usuário.";
            }
        }
    }
}
