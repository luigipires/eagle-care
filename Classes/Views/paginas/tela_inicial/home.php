<?php
	use Classes\Metodos;
?>
<section>
	<div class="banner-cadastro">
		<div class="fundo-transparente">
			<div class="container">
				<div class="texto-banner">
					<h2>Os melhores preços você encontra</h2>
					<h2>apenas aqui</h2>
					<h4>Faça parte da <i>EagleCare</i></h4>
					<h4>E utilize todos os benefícios que a plataforma oferece</h4>
					<a href="<?php echo CAMINHO; ?>cadastro">Cadastrar-se</a>
				</div><!-- texto-banner -->
			</div><!-- container -->
		</div><!-- fundo-transparente -->
	</div><!-- banner-cadastro -->
</section>

<section>
	<div class="ofertas-farmacia">
		<h2>Economize comprando com a gente</h2>
		
		<div class="container">

			<div class="produtos-farmacia">

				<?php
					foreach ($data as $key => $value){
				?>
				<div class="produto-solo">
					<div class="produto">
						<div class="imagem-produto">
							<img src="<?php echo ASSETS; ?>imagens/produto.jpg">
						</div><!-- imagem-produto -->

						<div class="dados-produto">
							<h2><?php echo ucfirst($value['nome']); ?></h2>
							<h4><i class="fas fa-notes-medical"></i> <?php echo ucfirst($value['laboratorio']); ?></h4>
							<h4><i class="fas fa-pills"></i> <?php echo $value['qtde_mg']; ?>mg</h4>
							<h4><i class="fas fa-money-bill"></i> R$ <?php echo Metodos::converterMoeda($value['preco']); ?></h4>
							<a href="<?php echo CAMINHO; ?>?adicionar-carrinho=<?php echo $value['id']; ?>">Comprar</a>
						</div><!-- dados-produto -->
					</div><!-- produto -->
				</div><!-- produto-solo -->
				<?php
					}
				?>

			</div><!-- produtos-farmacia -->
		</div><!-- container -->
	</div><!-- ofertas-farmacia -->
</section>