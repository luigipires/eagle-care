<?php
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
				<div>
					<p>Como deseja fazer o pagamento?</p>
					<select name="formapagamento">
						<option value="credito">Cartão de crédito</option>
						<option value="debito">Cartão de débito</option>
						<option value="dinheiro">Dinheiro</option>
					</select>
				</div>

				<div class="pergunta-troco">
					<p>Será necessário troco?</p>
					<select name="troco">
						<option value="sim">Sim</option>
						<option value="nao">Não</option>
					</select>
				</div><!-- pergunta-troco -->

				<div class="troco">
					<p>Se o troco for necessário, informe a quantia em dinheiro que você pagará:</p>
					<input type="text" name="valortroco">
				</div><!-- troco -->

				<div>
					<input type="hidden" name="pagamento">
					<input type="submit" value="Pagar">
				</div>
			</form>
		</div><!-- pagamento -->
	</div><!-- finalizacao-pedido -->
</section>