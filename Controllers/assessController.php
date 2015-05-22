<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'connection':
        if($_POST['mail'] && $_POST['password']){
            $mail = coreFormat::sanitizePost('mail');
            $pass = coreFormat::sanitizePost('password');
            if(coreFormat::checkMail($mail)){
                if($user = coreUser::isMailExist($mail)){
                    if(CoreSecure::cryptMatch($pass, $user['pass'])){
                        coreSession::create($user['mail'], $user['firstname'], $user['lastname']);
                        //coreSession::isValid();
                        $ajaxmsg[] = array("type" => "redirect", "msg" => CoreContent::getFileHtml(DOC_ROOT."/Content/assessmentEntry.php"), "field" => "");
                    }else{
                        $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad credential", "field" => "");
                    }
                }else{
                    $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad credential", "field" => "");
                }
            }else{
                $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad mail format", "field" => "mail");
            }
        }else{,;
            $ajaxmsg[] = array("type" => "erreur", "msg" => "incomplete form", "field" => "");
        }
        echo json_encode($ajaxmsg);
        exit();
    break;

    case 'goAssessment':
        $requiredFields = array('firstname', 'lastname', 'class');
        $completForm = true;
        foreach($requiredFields as $requiredField){
            if(!$$requiredField = coreFormat::sanitizePost($requiredField)){
                $ajaxmsg[] = array("type" => "erreur", "msg" => "Formualaire incomplet", "field" => $requiredField);
                $completForm = false;
            }
        }
        if($completForm){
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
            }
        }
        echo json_encode($ajaxmsg);
        exit();
    break;

    case 'endAssessment':
        $fingerprint = CoreSession::getFingerPrint($_SESSION['mail']);
        if(CoreSecure::cryptMatch($fingerprint, $_SESSION['fingerprint'])){
                $nbquestion = 5;
                $responses = array();
                for($i = 1; $i<=$nbquestion;$i++){
                    if(isset($_POST[$i])){
                        $responses[$i] = substr($_POST[$i], 0, 1);
                    }else{
                        $responses[$i] = 0;
                    }
                }
                //save into bdd
                $user = CoreUser::isMailExist($_SESSION['mail']);
                if(CoreUser::saveResponses(json_encode($responses), $user['id'])){
                    $ajaxmsg[] = array("type" => "redirect", "msg" => CoreContent::getFileHtml(DOC_ROOT."/Content/assessmentFinal.php"), "field" => "");
                }



        }else{
            //invalid mail ou session
        }

        echo json_encode($ajaxmsg);
        exit();
    break;
}

/*=======R E D I R E C T ========*/



require_once '/include/header.php';
require_once '/content/loginForm.php';
require_once '/include/footer.php';
?>
