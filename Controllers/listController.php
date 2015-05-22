<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'connection':

    break;

}

/*=======R E D I R E C T ========*/


require_once '/include/header.php';
require_once '/content/list.php';
require_once '/include/footer.php';
/*
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
}*/


?>
