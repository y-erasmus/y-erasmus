<?php
/**
 * Created by PhpStorm.
 * User: Carlos
 * Date: 22/05/2015
 * Time: 14:57
 */

/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    /*REGISTRATION*/
    case 'register':

        break;
}

/*=======R E D I R E C T ========*/



require_once '/include/header.php';
require_once '/content/register.php';
require_once '/include/footer.php';



/*
//check if session is valid
$fingerprint = CoreSession::getFingerPrint($_SESSION['mail']);
if(CoreSecure::cryptMatch($fingerprint, $_SESSION['fingerprint'])){
    if(CoreUser::updateUser($_SESSION['mail'], $firstname, $lastname, $class)){
        $query = CoreSql::getPDO()->prepare("SELECT assessmentquestion.id, assessmentquestion.question, questionanswer.id_question,questionanswer.id as answ_id, questionanswer.answer, questionanswer.correct FROM assessmentquestion LEFT JOIN questionanswer ON assessmentquestion.id = questionanswer.id_question ORDER BY assessmentquestion.id ASC");
        $go = $query->execute();
        $bddform = $query->fetchAll(PDO::FETCH_ASSOC);

        $form = [];
        foreach($bddform as $question){
            $form[$question['id_question']]['question'] = $question['question'];
            if($question['answer']){
                $form[$question['id_question']]['responses'][] = array('answer' => $question['answer'],
                                                                        'isCorrect' => $question['correct']);
            }
        }
        if(is_file( DOC_ROOT."/Content/assessmentForm.php")) {
           ob_start();
           include_once DOC_ROOT."/Content/assessmentForm.php";
           $html = ob_get_contents();
           ob_end_clean();
        }
        $ajaxmsg[] = array("type" => "redirect", "msg" => $html, "field" => "");
    }else{
        //erreur technique
    }
}else{
    //invalid mail ou session
}*/
?>
