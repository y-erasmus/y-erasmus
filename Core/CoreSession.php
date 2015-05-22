<?php
	class CoreSession{

		private static $COOKIE;



		public static function init(){
			self::$COOKIE = session_id();
		}


		public static function getcookie(){
			return self::$COOKIE;
		}

		//only admin
		public static function create($mail, $firstname, $lastname)
		{

				self::$COOKIE = session_id();
				//echo session_id();
				session_set_cookie_params (0, '/' , 'localhost', true, true);


				/*session.session.use_only_cookies = 1 ;//(prevents session fixation)
				session.hash_function= "sha256";*/
				//session.use_trans_sid should be set to FALSE
				$fingerprint = self::getFingerPrint($mail);
				$_SESSION['fingerprint'] = coreSecure::cryptPass($fingerprint);
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				$_SESSION['mail'] = $mail;

				$query = CoreSql::getPDO()->prepare("UPDATE user_admin SET fingerprint = :fingerprint WHERE mail = :mail;");
				$query->bindParam(':mail', $mail, PDO::PARAM_STR);
				$query->bindParam(':fingerprint', $_SESSION['fingerprint'], PDO::PARAM_STR);
		        if($query->execute()){
					return true;
		        }else{
		            return false;
		        }

		}

		public static function isValid($mail)
		{
			CoreSecure::cryptMatch('LUAXDETRUIRETOUT' . $_SERVER['REMOTE_ADDR'] . session_id().$mail, $_SESSION['fingerprint']);
		}

		public static function getFingerPrint($mail){
			return 'LUAXDETRUIRETOUT' . $_SERVER['REMOTE_ADDR'] . session_id().$mail;
		}

		public static function destroy()
		{
			if(session_destroy()){
				$_SESSION = array();
				self::$COOKIE = false;
				return true;
			}else{
				return false;
			}
		}

		public static function regenerate()
		{
			if(self::$COOKIE){
				session_regenerate_id(true);
				return self::$COOKIE = session_id();
			}else{
				return false;
			}
		}


    }

	CoreSession::init();

?>
