<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'register':
            /*ALL REQUIRED FIELDS*/
            $requiredFields = array('nom', 'prenom', 'pseudo', 'mail', 'password');
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
                    if(!coreUser::isExist($mail, $nom, $prenom)){
                        coreUser::saveUser($pseudo, $password, $nom, $prenom, $mail);
                    }else{
                        $ajaxmsg[] = array("type" => "erreur", "msg" => "Ce compte existe deja !", "field" => "");
                    }
                }
            }else{
                $ajaxmsg[] = array("type" => "erreur", "msg" => "incomplete form", "field" => "");
            }

        echo json_encode($ajaxmsg);
        exit();
    break;

    case 'addUser':
        $html = file_get_contents(DOC_ROOT."/Content/assessmentForm.php");
        //coreSession::isValid();
        $ajaxmsg[] = array("type" => "adduserok", "msg" => "$html", "field" => "");
        echo json_encode($ajaxmsg);
        exit();
    break;

    case 'logout':
        coreSession::Destroy();
        $ajaxmsg[] = array("type" => "logout", "msg" => URLFOFILE.'/admin', "field" => "");
        echo json_encode($ajaxmsg);
        exit();
    break;
}



    require_once '/include/header.php';
    require_once '/content/inscription.php';
    require_once '/include/footer.php';




?>
