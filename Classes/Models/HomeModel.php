<?php
	namespace Classes\Models;

	use Classes\MySql;

	class HomeModel{

		public static function itensFarmacia(){
			$sql = MySql::conexaobd()->prepare("SELECT * FROM `produtos`");
			$sql->execute();

			return $sql->fetchAll();
		}

		public static function buscarItem($id){
			$sql = MySql::conexaobd()->prepare("SELECT * FROM `produtos` WHERE id = ?");
			$sql->execute(array($id));

			return $sql->fetch();
		}
	}
?>