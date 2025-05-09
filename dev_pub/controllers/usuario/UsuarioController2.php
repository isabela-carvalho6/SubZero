<?php

require_once '../models/usuario/Usuario.php';

class UsuarioController {

    public function showForm() {
        require '../views/usuario/usuario_form.php';
    }

    public function saveUsuario() {
        $usuario->nome_completo = $_POST['nome_completo'];
        $usuario->cpf = $_POST['cpf'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];
        

        $usuario = new Usuario();
        $usuario->save($nome_completo, $cpf, $email, $senha);

        header('Location: /dev_pub/list-usuario');
    }

    public function listUsuario() {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll(); 

        require '../views/usuario/usuario_list.php';
    }

    public function deleteUsuarioByNome() {
        $usuario = $_POST['usuario'];  

        $usuario = new Usuario();
        $usuario->deleteByNome($usuario); 

        header('Location: /dev_pub/list-usuario');
    }

    public function showUpdateForm($id) {
        $usuario = new Usuario();
        $usuarioInfo = $usuario->getById($id); 

        require '../views/usuario/update_usuario_form.php';
    }

    public function updateUsuario() {
        $id = $_POST['id'];
        $usuario->nome_completo = $_POST['nome_completo'];
        $usuario->cpf = $_POST['cpf'];
        $usuario->email = $_POST['email'];
        $usuario->senha = $_POST['senha'];

        $usuario = new Usuario();
        $usuario->update($id, $nome_completo, $cpf, $email, $senha);

        header('Location: /dev_pub/list-usuario');
    }
}
