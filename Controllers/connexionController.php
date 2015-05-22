<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'connection':
        if($_POST['pseudo'] && $_POST['password']){
            $pseudo = coreFormat::sanitizePost('pseudo');
            $pass = coreFormat::sanitizePost('password');
              if($user = coreUser::isMailAdminExist($pseudo)){
                  if(CoreSecure::cryptMatch($pass, $user['Password'])){
                    $_SESSION['pseudo'] = $user['Pseudo'];

                      //coreSession::isValid();
                      $ajaxmsg[] = array("type" => "redi", "msg" => URLFOFILE."/profil", "field" => "");
                  }else{
                      $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad credential", "field" => "");
                  }
              }else{
                  $ajaxmsg[] = array("type" => "erreur", "msg" => "Bad credential 2", "field" => "");
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

/*if(isset($_SESSION['mail'], $_SESSION['fingerprint'])){
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
}*/


  require_once '/include/header.php';
  require_once '/content/connexion.php';
  require_once '/include/footer.php';
?>
