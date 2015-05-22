<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    /*REGISTRATION*/
    case 'register':
        $requiredFields = array('firstname', 'lastname', 'class', 'mail', 'formation');
        $completForm = true;
        foreach($requiredFields as $requiredField){
            if(!$$requiredField = coreFormat::sanitizePost($requiredField)){
                $ajaxmsg[] = array("type" => "erreur", "msg" => "Formulaire incomplet", "field" => $requiredField);
                $completForm = false;
            }
        }


        // N O  I N P U T S  E R R O R
        if($completForm){
            if(!coreFormat::checkMail($mail)){
                $ajaxmsg[] = array("type" => "erreur", "msg" => "Adresse mail invalide", "field" => "mail");
            }else{
                //user already exist
                if($user = CoreUser::isExist($mail,$firstname,$lastname,$formation,$class)){
                    //exam already passed
                    if($user['exampass']){
                        $ajaxmsg[] = array("type" => "erreur", "msg" => "Vous avez déja éfectué cet examen", "field" => "");
                    }else{
                        $_SESSION['mail'] = $user['mail'];
                        $ajaxmsg[] = array("type" => "redirect", "msg" => CoreContent::getFormHtml($user['mail']), "field" => "");
                    }
                }else{
                    //save
                    if(CoreUser::saveUser($mail, $firstname, $lastname, $class, $formation)){
                        $_SESSION['mail'] = $mail;
                        $ajaxmsg[] = array("type" => "redirect", "msg" => CoreContent::getFormHtml($mail), "field" => "");
                    }

                }
            }
        }
        echo json_encode($ajaxmsg);
        exit();
    break;

    case 'endAssessment':
        $fingerprint = coreFormat::sanitizePost("fingerprint");
        if(coreSecure::cryptMatch("LUAXDETRUIRETOUT".$_SESSION['mail'] , $_POST['fingerprint'])){
            $query = CoreSql::getPDO()->prepare("SELECT count(id) as nbquestion FROM `assessmentquestion`");
            $go = $query->execute();
            $count = $query->fetch(PDO::FETCH_ASSOC);
            $nbquestion = $count['nbquestion'];
            $responses = array();
            for($i = 1; $i<=$nbquestion;$i++){
                if(isset($_POST[$i])){
                    $responses[$i] = (int) $_POST[$i];
                }else{
                    $responses[$i] = 0;
                }
            }
            //save into bdd
            $user = CoreUser::isMailExist($_SESSION['mail']);
            if($user){
                if(CoreUser::saveResponses(json_encode($responses), $user['id'])){
                    //correction
                    $query = CoreSql::getPDO()->prepare("SELECT id, id_question FROM `questionanswer` WHERE correct = 1 ORDER BY id_question ASC");
                    $go = $query->execute();
                    $bddresponses = $query->fetchAll(PDO::FETCH_ASSOC);

                    // FORMAT AS ARRAY
                    $form = [];
                    $score = 0;
                    foreach($bddresponses as $bddresponse){
                        if(isset($responses[$bddresponse['id_question']]) && $responses[$bddresponse['id_question']] == $bddresponse['id']){
                            $score++;
                        }
                    }

                    //exampass + score
                    CoreUser::setExamPassed($_SESSION['mail'], $score);

                    if(is_file( DOC_ROOT."/Content/assessmentFinal.php")) {
                       ob_start();
                       include_once DOC_ROOT."/Content/assessmentFinal.php";
                       $html = ob_get_contents();
                       ob_end_clean();
                    }
                    $ajaxmsg[] = array("type" => "redirect", "msg" => $html, "field" => "");
                    CoreSession::destroy();
                }
            }else{
                echo 'une erreur est survenue';
            }

        }

        echo json_encode($ajaxmsg);
        exit();
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
