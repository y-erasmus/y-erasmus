<?php
/*======== A J A X =========*/
$todo = coreFormat::sanitizePost('todo');
switch($todo){
    case 'filterbylang':
      echo $_POST['Sort']

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
