<?php
	namespace Classes\Controllers;

	use Classes\Views\puxarViews;
	use Classes\Metodos;
	use Classes\MySql;
	
	use Classes\Models\UsuariosModel;
	use Classes\Models\HomeModel;

	class HistoricoPedidoController{

		public function index(){

			if(!isset($_SESSION['login'])){
				Metodos::redirecionar(CAMINHO);
			}

			$data = self::carrinho();

			self::concluirPedido();

			// renderização da view
			puxarViews::renderizar('tela_inicial/historico-pedido', $data);
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

		private static function concluirPedido(){
			if(isset($_GET['pedido-concluido'])){
				session_unset();
				Metodos::redirecionar(CAMINHO);
			}
		}
	}
?>