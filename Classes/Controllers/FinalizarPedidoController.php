<?php
	namespace Classes\Controllers;

	use Classes\Views\puxarViews;
	use Classes\Metodos;
	use Classes\MySql;
	
	use Classes\Models\UsuariosModel;
	use Classes\Models\HomeModel;

	class FinalizarPedidoController{

		public function index(){

			if(!isset($_SESSION['login'])){
				Metodos::redirecionar(CAMINHO);
			}

			$data = self::carrinho();

			puxarViews::renderizar('tela_inicial/finalizar-pedido',$data);
		}

		private static function carrinho(){
			$array = [];

			if(!isset($_SESSION['carrinho'])){
				$array['mensagem'] = 'Você não fez nenhum pedido!';

				$informacoes = $array;
			}else{
				foreach ($_SESSION['carrinho'] as $item){
					$array[] = HomeModel::buscarItem($item);
				}

				$informacoes = $array;
			}

			return $informacoes;
		}
	}
?>