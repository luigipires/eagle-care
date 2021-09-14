<?php
	namespace Classes\Controllers;

	use Classes\Views\puxarViews;
	use Classes\Metodos;
	use Classes\MySql;
	
	use Classes\Models\UsuariosModel;

	class HomeController{

		//nome da pastas
		private static $usuarios = 'usuarios';

		public function index(){
			if(!isset($_SESSION['login'])){
				puxarViews::renderizar('tela_inicial/home');
			}

			self::deslogar();

			puxarViews::renderizarPainel('painel/home');
		}

		//desloga da conta
		private static function deslogar(){
			if(isset($_GET['sair'])){
				Metodos::logout();
			}
		}
	}
?>