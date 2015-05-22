<?php

require('requires.php');

/*CoreSql::connect();*/
//$res = CoreSql::query('select * from categories');
//$res = CoreSql::exec('insert into categories (name, slug) VALUES ("teest","teest")');
/*$obj = new stdClass();
$obj->slug = "test11";
$obj->name = "test11";
//$obj->id = "3";
$res = CoreSql::findId($obj, "categories", true);*/

session_start();
//manage url and call
if(isset($_GET['params'])){
	$params = explode( "/", $_GET['params']);
}else{
	$params = array(0 => '');
}
	$Routing = Routing::getInstance();
	$file = $Routing::get($params);
	if($file){
		require_once $file;
	}else{
		if($Er404 = $Routing::return404Header()){
			$file = $Routing::get(['0' => '404']);
			if($file)
				require_once $file;
		}
		exit;
	}


?>
