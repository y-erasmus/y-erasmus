<?php
class CoreUser {

	public static function isMailExist($mail){
        $query = CoreSql::getPDO()->prepare("SELECT * FROM user where mail=:mail ;");
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $go = $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
			return $user;
        }else{
            return false;
        }
	}

	public static function isMailAdminExist($pseudo){
        $query = CoreSql::getPDO()->prepare("SELECT * FROM user where Pseudo=:pseudo ;");
        $query->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $go = $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
			return $user;
        }else{
            return false;
        }
	}

	public static function isExist($mail, $nom, $prenom){
		$query = CoreSql::getPDO()->prepare("SELECT * FROM user where Mail=:mail
			OR Nom =:nom
			AND Prenom =:prenom;");
		$query->bindParam(':mail', $mail, PDO::PARAM_STR);
		$query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
		$query->bindParam(':nom', $nom, PDO::PARAM_STR);
        $go = $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
			return $user;
        }else{
            return false;
        }
	}

	public static function setExamPassed($mail, $score){
		$query = CoreSql::getPDO()->prepare("UPDATE user SET exampass = 1 , score = :score
			 WHERE mail = :mail;");
			$query->bindParam(':mail', $mail, PDO::PARAM_STR);
			$query->bindParam(':score', $score, PDO::PARAM_STR);
        if($query->execute()){
			return true;
        }else{
            return false;
        }
	}

	public static function updateUser($mail, $firstname, $lastname, $formation, $class){
        $query = CoreSql::getPDO()->prepare("UPDATE user SET firstname = :firstname,
			 lastname = :lastname,
			id_class = :class
			id_formation = :formation WHERE mail = :mail;");
		$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
		$query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
		$query->bindParam(':class', $class, PDO::PARAM_STR);
		$query->bindParam(':mail', $mail, PDO::PARAM_STR);
        if($query->execute()){
			return true;
        }else{
            return false;
        }
	}

	public static function saveUser($pseudo, $pass, $nom, $prenom, $mail){
        $query = CoreSql::getPDO()->prepare("INSERT INTO user (Pseudo, Password, Nom, Prenom, Mail) VALUES (:Pseudo, :Password, :Nom, :Prenom, :Mail);");
		$query->bindParam(':Pseudo', $pseudo, PDO::PARAM_STR);
		$query->bindParam(':Password', (coreSecure::cryptPass($pass)), PDO::PARAM_STR);
		$query->bindParam(':Nom', $nom, PDO::PARAM_STR);
		$query->bindParam(':Prenom', $prenom, PDO::PARAM_STR);
		$query->bindParam(':Mail', $mail, PDO::PARAM_STR);
		if($query->execute()){
			return CoreSql::getPDO()->lastInsertId();
        }else{
            return false;
        }
	}

}
?>
