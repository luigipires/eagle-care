<?php
	use Classes\Metodos;
?>
<section>
	<div class="finalizacao-pedido">
		<table>
			<tr>
				<td></td>
				<td>Método de pagamento</td>
				<td>Preço</td>
			</tr>
			<?php
				foreach ($data as $key => $value){
			?>
			<tr>
				<td><img src="<?php echo ASSETS; ?>imagens/produto.jpg"></td>
				<td><?php echo ucfirst($_SESSION['formapagamento']);?></td>
				<td>R$ <?php echo Metodos::converterMoeda($value['preco']); ?></td>
			</tr>
			<?php
				}
			?>
		</table>
		
		<h4>Total: R$ <?php echo Metodos::converterMoeda($_SESSION['valorpedido']); ?></h4>

		<?php
			if($_SESSION['formapagamento'] == 'dinheiro'){
				if($_SESSION['troco'] == 'sim'){
		?>
		<h4>O troco do cliente é: R$ <?php echo number_format($_SESSION['trococliente'],2,',',''); ?></h4>
		<?php
				}else{
		?>
		<div></div>
		<?php
				}
			}
		?>

		<h3>Dentro de <b>30 minutos</b> estaremos entregando seus produtos no endereço <b><?php echo ucfirst($_SESSION['endereco']); ?></b> </h3>
	</div><!-- finalizacao-pedido -->

	<div class="fechar-pedido">
		<a href="<?php echo CAMINHO; ?>historicopedido?pedido-concluido">Fechar pedido</a>
	</div><!-- fechar-pedido -->
</section>
