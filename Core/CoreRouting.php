<?php
class Routing {

	private static $instance;
	public static $routing;

	private function __construct(){
		self::$routing = array(
			'inscription' => 'Controllers/inscriptionController.php',
			'profil' => 'Controllers/profilController.php',
			'list' => 'Controllers/listController.php',
			'search' => 'Controllers/searchController.php',
			'inbox' => 'Controllers/inboxController.php',
			'forum' => 'Controllers/forumController.php',
			'404' => 'Content/404.php',
			'admin' => array( '' => 'Controllers/adminController.php',
							'correction' => 'Controllers/correctionController.php'),
			'' => 'Controllers/connexionController.php'
		);
	}

	public static function getInstance(){
		if(is_null( self::$instance )){
			self::$instance = new self();
		}
		return self::$instance;
	}

	public static function get($params){
		$tempurl = self::$routing;
		foreach($params as $k => $param){
				if(isset($tempurl[$param])){
					$file = $tempurl[$param];
					$tempurl = $tempurl[$param];
				}else{
					return false;
				}


		}
		if(is_array($file)){
			$file = reset($file);
		}
		return $file;
	}

	public static function return404Header(){
		header('Status: 404 Not Found');
    	header('HTTP/1.0 404 Not Found');
    	return true;
	}

	public static function redirect($url){
		//header('Location: 'echo URL.$url);
	}
}
?>
