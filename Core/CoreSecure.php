<?php
	class CoreSecure{

        public static function cryptPass($pass){
            $salt = "";
            $randSalt = array_merge(range('A','Z'), range('a','z'), range('0', '9'));

            for($i = 0; $i<22; $i++){
                $salt .= $randSalt[array_rand($randSalt)];
            }
            return crypt($pass, '$2y$05$'.$salt.'$');
        }

        public static function cryptMatch($pass, $hashed){
            return (crypt($pass,$hashed) == $hashed) ? true : false;
        }
    }

?>
