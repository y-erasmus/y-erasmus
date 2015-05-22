<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'register':
        if($_POST['pseudo'] && $_POST['password'] && $_POST['prenom'] && $_POST['nom']){
            $pseudo = coreFormat::sanitizePost('pseudo');
            $pass = coreSecure::cryptPass(coreFormat::sanitizePost('password'));
            $prenom = coreFormat::sanitizePost('prenom');
            $nom = coreFormat::sanitizePost('nom');


            coreUser::saveUser($pseudo, $pass);


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
