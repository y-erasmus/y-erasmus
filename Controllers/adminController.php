<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'connection':
        if($_POST['mail'] && $_POST['password']){
            $mail = coreFormat::sanitizePost('mail');
            $pass = coreFormat::sanitizePost('password');
            if(coreFormat::checkMail($mail)){
                if($user = coreUser::isMailAdminExist($mail)){
                    if(CoreSecure::cryptMatch($pass, $user['pass'])){
                        CoreSession::create($user['mail'], $user['firstname'], $user['lastname']);
                        $html = CoreContent::getAdminResultsHtml();
                        //coreSession::isValid();
                        $ajaxmsg[] = array("type" => "redirect", "msg" => "$html", "field" => "");
                    }else{
                        $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad credential", "field" => "");
                    }
                }else{
                    $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad credential", "field" => "");
                }
            }else{
                $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad mail format", "field" => "");
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

/*=======R E D I R E C T ========*/

if(isset($_SESSION['mail'], $_SESSION['fingerprint'])){
    $query = CoreSql::getPDO()->prepare("SELECT fingerprint FROM user_admin WHERE mail = :mail;");
    $query->bindParam(':mail', $_SESSION['mail'] , PDO::PARAM_STR);
    $go = $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if($user){
        if($user['fingerprint'] == $_SESSION['fingerprint']){
            require_once '/include/header.php';
            require_once '/include/adminMenu.php';
            echo CoreContent::getAdminResultsHtml();
            require_once '/include/footer.php';
        }else{
            require_once '/include/header.php';
            require_once '/content/loginForm.php';
            require_once '/include/footer.php';
        }
    }else{
        require_once '/include/header.php';
        require_once '/content/loginForm.php';
        require_once '/include/footer.php';
    }
}else{
    require_once '/include/header.php';
    require_once '/content/loginForm.php';
    require_once '/include/footer.php';
}


?>
