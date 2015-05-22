<?php
	class CoreFormat{

        public static function checkMail($mail){
            $pattern = '/^[a-z]+[a-z0-9._-]*[a-z0-9]@[a-z]+[a-z0-9._-]*[a-z0-9]+\.[a-z]{2,4}$/';
            return preg_match($pattern, strtolower($mail));
        }

        /*public static function checkPosts(){
            if($_POST){
                foreach ($_POST as $key => $value) {
                    $$key = $value;
                }
            }
        }*/

        public static function checkPost($name){
            if(isset($_POST[$name])){
                $var = '';
                if(ctype_digit($_POST[$name]))
                {
                    $var = intval($_POST[$name]);
                }else{
                    $var = addcslashes($_POST[$name], '%_');
                }
                return $var;
            }else{
                return false;
            }
        }

		public static function sanitizePost($str){
			return isset($_POST[$str]) ? strip_tags(stripslashes(trim($_POST[$str]))) : '';
		}

    }

?>
