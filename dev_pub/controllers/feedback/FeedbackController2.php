<?php

require_once '../models/feedback/Feedback.php';

class FeedbackController {

    public function showForm() {
        require '../views/feedback/feedback_form.php';
    }

    public function saveFeedback() {
        $feedback->titulo = $_POST['titulo'];
        $feedback->descricao = $_POST['descricao'];
        $feedback->data_feedback = $_POST['data_feedback'];
        

        $feedback = new Feedback();
        $feedback->save($titulo, $descricao, $data_feedback);

        header('Location: /dev_pub/list-feedback');
    }

    public function listFeedback() {
        $feedback = new Feedback();
        $feedbacks = $feedback->getAll(); 

        require '../views/feedback/feedback_list.php';
    }

    public function deleteFeedbackByTitulo() {
        $feedback = $_POST['feedback'];  

        $feedback = new Feedback();
        $feedback->deleteByNome($feedback); 

        header('Location: /dev_pub/list-feedback');
    }

    public function showUpdateForm($id_feedback) {
        $feedback = new Feedback();
        $feedbackInfo = $feedback->getById($id_feedback); 

        require '../views/feedback/update_feedback_form.php';
    }

    public function updateFeedback() {
        $id_feedback = $_POST['id_feedback'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data_feedback = $_POST['data_feedback'];

        $feedback = new Feedback();
        $feedback->update($id_feedback, $titulo, $descricao, $data_feedback);

        header('Location: /dev_pub/list-feedback');
    }
}
