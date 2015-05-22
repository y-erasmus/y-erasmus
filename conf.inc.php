<?php
define('_USER'              , 'root');
define('_PASS'              , '');
define('_SERVER'            , 'mysql:dbname=school;host=127.0.0.1');
define('_TOKEN'				, 'YoanCyrilYann');
define('_SITE'				, 'Nom du site');
/* RELATIVE */
define('DOC_ROOT'                   , dirname(__FILE__).'/');
/* PROD
define('URL'				, 'http://'.$_SERVER['SERVER_NAME']); */
define('URL'				,  "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define('IMAGES'				,  URL.'images');
define('ASSETS'				,  URL.'Assets/');
define('JS'					,  ASSETS.'js/');
define('CSS'				,  URL.'css/');

define('URLFOFILE'          ,  "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']))
?>
