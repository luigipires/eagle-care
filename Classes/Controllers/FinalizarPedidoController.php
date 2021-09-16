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

			if(isset($_POST['pagamento'])){
				$formapagamento = $_POST['formapagamento'];
				$troco = $_POST['troco'];
				$valortroco = $_POST['valortroco'];

				$_SESSION['formapagamento'] = $formapagamento;

				if($formapagamento == 'dinheiro'){
					$_SESSION['troco'] = $troco;

					if($troco == 'sim'){
						if($valortroco == ''){
							echo '<script>alert("Insira o valor que pretende pagar");</script>';
						}else{
							foreach ($_SESSION['carrinho'] as $produto){
								$sql = MySql::conexaobd()->prepare("INSERT INTO `pedidos` VALUES (null,?,?,?,?,?,?)");
								$sql->execute(array($_SESSION['id'],$produto,$_SESSION['valorpedido'],$formapagamento,$troco,$valortroco));
							}

							$trococliente = $valortroco - $_SESSION['valorpedido'];

							$_SESSION['trococliente'] = $trococliente;
							
							Metodos::redirecionar(CAMINHO.'historicopedido');
						}
					}else{
						foreach ($_SESSION['carrinho'] as $produto){
							$sql = MySql::conexaobd()->prepare("INSERT INTO `pedidos` VALUES (null,?,?,?,?,?,?)");
							$sql->execute(array($_SESSION['id'],$produto,$_SESSION['valorpedido'],$formapagamento,$troco,0));
						}

						Metodos::redirecionar(CAMINHO.'historicopedido');
					}
				}else{
					foreach ($_SESSION['carrinho'] as $produto){
						$sql = MySql::conexaobd()->prepare("INSERT INTO `pedidos` VALUES (null,?,?,?,?,?,?)");
						$sql->execute(array($_SESSION['id'],$produto,$_SESSION['valorpedido'],$formapagamento,'não',0));
					}

					Metodos::redirecionar(CAMINHO.'historicopedido');
				}
			}

			// renderização da view
			puxarViews::renderizar('tela_inicial/finalizar-pedido', $data);
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