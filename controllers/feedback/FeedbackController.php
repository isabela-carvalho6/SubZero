<?php

require_once '../models/feedback/Feedback.php';

class FeedbackController {

    public function showForm() {
        include '../views/feedback/feedback_form.php';
    }

    public function saveFeedback() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $feedback = new Feedback();
            
            $feedback->titulo = $_POST['titulo'];
            $feedback->mensagem = $_POST['mensagem'];
            $feedback->data_feedback = date('Y-m-d');
            

            if ($feedback->save()) {
                header('Location: /SubZero/public/list-feedback');
            } else {
                echo "Erro ao postar feedback.";
            }
        }
    }

    public function listFeedback() {

        $feedback = new Feedback();
        $feedbacks = $feedback->getAll();
        
        include '../views/feedback/feedback_list.php';
    }

    public function showUpdateForm($id_feedback) {
        $feedback = new Feedback();
        $feedbackInfo = $feedback->getById($id_feedback);
        include '../views/feedback/update_feedback_form.php';
    }

    public function updateFeedback() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $feedback = new Feedback();
            $feedback->id_feedback = $_POST['id_feedback'];
            $feedback->titulo = $_POST['titulo'];
            $feedback->mensagem = $_POST['mensagem'];
            $feedback->data_feedback = date('Y-m-d');
            if ($feedback->update()) {
                header('Location: /SubZero/public/list-feedback');
            } else {
                echo "Erro ao atualizar o feedback.";
            }
        }
    }

    public function deleteFeedbackByTitulo() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $feedback = new Feedback();
            
            $feedback->titulo = $_POST['titulo'];

            if ($feedback->deleteByNome($_POST['titulo'])) {
                header('Location: /SubZero/public/list-feedback');
            } else {
                echo "Erro ao excluir o feedback.";
            }
        }
    }
    
    public function deleteFeedbackById() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $feedback = new Feedback();
            $id_feedback = $_POST['id_feedback'];
            if ($feedback->deleteById($id_feedback)) {
                header('Location: /SubZero/public/list-feedback');
            } else {
                echo "Erro ao excluir o feedback.";
            }
        }
    }
}
