<?php
	namespace Classes\Models;

	use Classes\MySql;

	class UsuariosModel{

		public static function verificarUsuario($email){
			$sql = MySql::conexaobd()->prepare("SELECT * FROM `usuarios` WHERE email = ?");
			$sql->execute(array($email));

			if($sql->rowCount() == 0){
				return true;
			}else{
				return false;
			}
		}

		public static function puxarDados($email){
			$sql = MySql::conexaobd()->prepare("SELECT * FROM `usuarios` WHERE email = ?");
			$sql->execute(array($email));

			return $sql->fetch();
		}
	}
?>