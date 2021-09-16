<?php
	namespace Classes\Controllers;

	use Classes\Views\puxarViews;
	use Classes\Metodos;
	use Classes\MySql;
	
	use Classes\Models\UsuariosModel;
	use Classes\Models\HomeModel;

	class HomeController{

		//nome das pastas
		private static $usuarios = 'usuarios';

		public function index(){
			self::deslogar();
			self::carrinho();

			$itens = HomeModel::itensFarmacia();

			puxarViews::renderizar('tela_inicial/home',$itens);
		}

		//desloga da conta
		private static function deslogar(){
			if(isset($_GET['sair'])){
				Metodos::logout();
			}
		}

		//retém informãções da cesta de compras
		private static function carrinho(){
			if(isset($_GET['adicionar-carrinho'])){

				if(isset($_SESSION['login'])){
					$idproduto = (int)$_GET['adicionar-carrinho'];

					if(!isset($_SESSION['carrinho'])){
						$_SESSION['carrinho'] = [];
					}

					$_SESSION['carrinho'][] = $idproduto;

					Metodos::redirecionar(CAMINHO);
				}
			}	
		}
	}
?>