<?php

require_once '../models/adm/Adm.php';

class AdmController {

    public function showForm() {
        require '../views/adm/adm_form.php';
    }

    public function saveAdm() {
        $nome_completo = $_POST['nome_completo'];
        $senha = $_POST['senha'];

        $adm = new Adm();
        $adm->save($nome_completo, $senha);

        header('Location: /dev_pub/list-adm');
    }

    public function listAdm() {
        $adm = new Adm();
        $adms = $adm->getAll(); 

        require '../views/adm/adm_list.php';
    }

    public function deleteAdmByNome() {
        $adm = $_POST['adm'];  

        $adm = new Adm();
        $adm->deleteByNome($adm); 

        header('Location: /dev_pub/list-adm');
    }

    public function showUpdateForm($id) {
        $adm = new Adm();
        $admInfo = $adm->getById($id); 

        require '../views/adm/update_adm_form.php';
    }

    public function updateAdm() {
        $id = $_POST['id'];
        $nome_completo = $_POST['nome_completo'];
        $senha = $_POST['senha'];

        $adm = new Adm();
        $adm->update($id, $nome_completo, $senha);

        header('Location: /dev_pub/list-adm');
    }
}
