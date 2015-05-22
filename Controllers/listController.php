<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'filterbylang':
      $lang = Array("1"=>"Français","2"=>"Anglais","3"=>"Espanol","4"=>"Russe","5"=>"Arabe","6"=>"Chinois","7"=>"Allemand","8"=>"Japonais","9"=>"Portugais","10"=>"Hindi");

      $lang = $lang[$_POST['Sort']];
      $query = CoreSql::getPDO()->prepare("SELECT user.Pseudo, user.Nom, user.Prenom FROM user, profil WHERE profil.Langue_Parlees='$lang' AND user.user_id = profil.user_id;");
      $go = $query->execute();
      $users = $query->fetchAll(PDO::FETCH_ASSOC);
      if(is_file( DOC_ROOT."/content/list.php")) {
         ob_start();
         include_once DOC_ROOT."/content/list.php";
         $html = ob_get_contents();
         ob_end_clean();
      }
      $ajaxmsg[] = array("type" => "redirect", "msg" => $html, "field" => "");
      echo json_encode($ajaxmsg);
      exit();
    break;
}

$query = CoreSql::getPDO()->prepare("SELECT Pseudo, Nom, Prenom FROM user;");
$go = $query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);



/*=======R E D I R E C T ========*/

require_once '/include/header.php';
require_once '/content/list.php';
require_once '/include/footer.php';

?>
