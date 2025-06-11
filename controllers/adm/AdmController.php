<?php

require_once '../models/adm/Adm.php';

class AdmController {

    public function showForm() {
        include '../views/adm/adm_form.php';
    }

    public function saveAdm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adm = new Adm();
            $adm->nome_completo = $_POST['nome_completo'];
            $adm->senha = $_POST['senha'];
            if ($adm->save()) {
                header('Location: /SubZero/public/list-adm');
                exit;
            } else {
                echo "Erro ao cadastrar o ADM.";
            }
        }
    }

    public function listAdm() {
        $adm = new Adm();
        $adms = $adm->getAll();
        include '../views/adm/adm_list.php';
    }

    public function showUpdateForm($id) {
        $adm = new Adm();
        $admInfo = $adm->getById($id);
        include '../views/adm/update_adm_form.php';
    }

    public function updateAdm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adm = new Adm();
            $adm->id_adm = $_POST['id_adm'];
            $adm->nome_completo = $_POST['nome_completo'];
            $adm->senha = $_POST['senha'];
            if ($adm->update()) {
                header('Location: /SubZero/public/list-adm');
                exit;
            } else {
                echo "Erro ao atualizar o administrador.";
            }
        }
    }

    public function deleteAdm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $adm = new Adm();
            $adm->id_adm = $_POST['id_adm'];
            if ($adm->delete()) {
                header('Location: /SubZero/public/list-adm');
                exit;
            } else {
                echo "Erro ao excluir o ADM.";
            }
        }
    }
}
