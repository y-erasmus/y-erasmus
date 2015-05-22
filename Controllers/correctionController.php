<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'updateCorrection':
        //question id
        $Qid = (int) coreFormat::sanitizePost('Qid');
        $id = (int) coreFormat::sanitizePost("id");



        $query = CoreSql::getPDO()->prepare("UPDATE questionanswer
                    SET correct = 0
                    WHERE id_question = $Qid;
                    UPDATE questionanswer
                    SET correct = 1
                    WHERE id = $id;");

        if($query->execute()){

        }else{

        }

        exit;
    break;
}

if(isset($_SESSION['mail'], $_SESSION['fingerprint'])){
    $query = CoreSql::getPDO()->prepare("SELECT fingerprint FROM user_admin WHERE mail = :mail;");
    $query->bindParam(':mail', $_SESSION['mail'] , PDO::PARAM_STR);
    $go = $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if($user){
        if($user['fingerprint'] == $_SESSION['fingerprint']){

            //GET ALL QUESTIONS AN REPONSES
            $query = CoreSql::getPDO()->prepare("SELECT assessmentquestion.id, assessmentquestion.question, questionanswer.id_question,questionanswer.id as answ_id, questionanswer.answer, questionanswer.correct FROM assessmentquestion LEFT JOIN questionanswer ON assessmentquestion.id = questionanswer.id_question ORDER BY assessmentquestion.id ASC");
            $go = $query->execute();
            $bddform = $query->fetchAll(PDO::FETCH_ASSOC);

            // FORMAT AS ARRAY
            $form = [];
            foreach($bddform as $question){
                $form[$question['id_question']]['question'] = $question['question'];
                if($question['answer']){
                    $form[$question['id_question']]['responses'][$question['answ_id']] = array('answer' => $question['answer'],
                                                                            'isCorrect' => $question['correct']);
                }
            }


            /*=======R E D I R E C T ========*/


            require_once '/include/header.php';
            require_once '/content/correctionForm.php';
            require_once '/include/footer.php';
        }else{
            header("Location: ".URLFOFILE."/admin");
        }
    }else{
        header("Location: ".URLFOFILE."/admin");
    }
}else{
    header("Location: ".URLFOFILE."/admin");
}

?>
