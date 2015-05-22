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

	public static function isExist($mail, $firstname, $lastname, $formation, $class){
		$query = CoreSql::getPDO()->prepare("SELECT * FROM user where mail=:mail
			OR lastname =:lastname
			AND firstname =:firstname
			AND id_formation =:formation
			AND id_class =:class;");
		$query->bindParam(':mail', $mail, PDO::PARAM_STR);
		$query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
		$query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
		$query->bindParam(':formation', $formation, PDO::PARAM_INT);
		$query->bindParam(':class', $class, PDO::PARAM_INT);
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

	public static function saveUser($pseudo, $password){
        $query = CoreSql::getPDO()->prepare("INSERT INTO user (Pseudo, Password) VALUES (:Pseudo, :Password);");
		$query->bindParam(':Pseudo', $pseudo, PDO::PARAM_STR);
		$query->bindParam(':Password', (coreSecure::cryptPass($password)), PDO::PARAM_STR);
		if($query->execute()){
			return CoreSql::getPDO()->lastInsertId();
        }else{
            return false;
        }
	}

	public static function saveResponses($responses, $userId){
		$query = CoreSql::getPDO()->prepare("INSERT INTO userresponses (user_id, results) VALUES (:user_id, :results)");
		$query->bindParam(':user_id', $userId, PDO::PARAM_INT);
		$query->bindParam(':results',$responses);
        if($query->execute()){
			return CoreSql::getPDO()->lastInsertId();
        }else{
            return false;
        }
	}
}
?>
