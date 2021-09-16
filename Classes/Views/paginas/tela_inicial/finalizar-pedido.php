<?php
	use Classes\Models\HomeModel;
	use Classes\Metodos;
?>
<section>
	<div class="finalizacao-pedido">
		<?php
			if(isset($data['mensagem'])){
				echo 'Você não fez nenhum pedido!';
			}
		?>
		<table>
			<tr>
				<td></td>
				<td>Preço</td>
			</tr>
			<?php
				$total = 0;

				foreach ($data as $key => $value){
					if(!isset($data['mensagem'])){
			?>
			<tr>
				<td><img src="<?php echo ASSETS; ?>imagens/produto.jpg"></td>
				<td>R$ <?php echo Metodos::converterMoeda($value['preco']); ?></td>
			</tr>
			<?php
						$total+=$value['preco'];
						$_SESSION['valorpedido'] = $total;
					}
				}
			?>
		</table>

		<h4>O total do seu pedido foi: R$ <?php echo Metodos::converterMoeda($_SESSION['valorpedido']); ?></h4>

		<div class="pagamento">
			<h2>Escolha o método de pagamento:</h2>
			
			<form method="post">
				<?php
					if(isset($_POST['acao'])){

						if(!isset($_SESSION['pedido'])){
							echo 'Você não fez nenhum pedido!';
						}

						$formapagamento = $_POST['formapagamento'];
						$troco = $_POST['troco'];
						$valortroco = $_POST['valortroco'];

						$_SESSION['formapagamento'] = $formapagamento;

						if($formapagamento == 'dinheiro'){
							$_SESSION['troco'] = $troco;
							if($troco == 'sim'){
								if($valortroco == ''){
									echo "Insira o valor que deseja pagar.";
								}else{
									$sql = MySql::conexaobd()->prepare("INSERT INTO `compra` VALUES (null,?,?,?)");
									$sql->execute(array($formapagamento,$troco,$valortroco));
									$trococliente = $valortroco - $_SESSION['valorpedido'];
									$_SESSION['trococliente'] = $trococliente;
									echo '<script>alert("Pagamento realizado! Seu troco é de R$ '.number_format($trococliente,2,',','').'");</script>';
									echo '<script>location.href="'.INCLUDE_PATH.'historicopedido";</script>';
								}
							}else{
								$sql = MySql::conexaobd()->prepare("INSERT INTO `compra` VALUES (null,?,?,?)");
								$sql->execute(array($formapagamento,$troco,0));
								echo '<script>alert("Pagamento realizado!");</script>';
								echo '<script>location.href="'.INCLUDE_PATH.'historicopedido";</script>';
							}
						}else{
							$sql = MySql::conexaobd()->prepare("INSERT INTO `compra` VALUES (null,?,?,?)");
							$sql->execute(array($formapagamento,'não',0));
							echo '<script>alert("Pagamento realizado!");</script>';
							echo '<script>location.href="'.INCLUDE_PATH.'historicopedido";</script>';
						}
					}
				?>
				<div>
					<p>Como deseja fazer o pagamento?</p>
					<select name="formapagamento">
						<option value="credito">Cartão de crédito</option>
						<option value="debito">Cartão de débito</option>
						<option value="dinheiro">Dinheiro</option>
					</select>
				</div>

				<div class="aparece">
					<p>Será necessário troco?</p>
					<select name="troco">
						<option value="sim">Sim</option>
						<option value="nao">Não</option>
					</select>
				</div><!-- aparece -->

				<div class="troco">
					<p>Se o troco for necessário, informe a quantia em dinheiro que você pagará:</p>
					<input type="text" name="valortroco">
				</div><!-- troco -->

				<div>
					<input type="submit" name="acao" value="Pagar">
				</div>
			</form>
		</div><!-- pagamento -->
	</div><!-- finalizacao-pedido -->
</section>