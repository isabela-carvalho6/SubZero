<?php

require_once '../models/bar/Bar.php';

class BarController {

    public function showForm() {
        require '../views/bar/bar_form.php';
    }

    public function saveBar() {
        $bar->nome_completo = $_POST['nome_completo'];
        $bar->email = $_POST['email'];
        $bar->cep = $_POST['cep'];
        $bar->numero = $_POST['numero'];
        $bar->tipo = $_POST['tipo'];
        $bar->senha = $_POST['senha'];
        

        $bar = new Bar();
        $bar->save($nome_completo, $email, $cep, $numero, $tipo, $senha);

        header('Location: /dev_pub/list-bar');
    }

    public function listBar() {
        $bar = new Bar();
        $bares = $bar->getAll(); 

        require '../views/bar/bar_list.php';
    }

    public function deleteBarByNome() {
        $bar = $_POST['bar'];  

        $bar = new Bar();
        $bar->deleteByNome($bar); 

        header('Location: /dev_pub/list-bar');
    }

    public function showUpdateForm($id_bar) {
        $bar = new Bar();
        $barInfo = $bar->getById($id_bar); 

        require '../views/bar/update_bar_form.php';
    }

    public function updateBar() {
        $id_bar = $_POST['id_bar'];
        $nome_completo = $_POST['nome_completo'];
        $email = $_POST['email'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $tipo = $_POST['tipo'];
        $senha = $_POST['senha'];

        $bar = new Bar();
        $bar->update($id_bar, $nome_completo, $email, $cep, $numero, $tipo,  $senha);

        header('Location: /dev_pub/list-bar');
    }
}
