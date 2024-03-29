<?php
	use Classes\Metodos;
?>
<section>
	<div class="tela-login">
		<div class="fundo-branco">
			<div class="login">
				<div>
					<h2>Entre na sua conta</h2>
					<div class="line"></div>
				</div>

				<form id="login" method="post">
					<div class="feedback">
						<p>E-mail</p>
						<input type="email" name="email-login" value="<?php echo Metodos::recoverField('email-login'); ?>">
					</div>
					<div class="senha">
						<p>Senha</p>
						<input type="password" name="senha-login">

						<div class="mostrar-senha">
							<h3><i class="fas fa-eye"></i></h3>
						</div><!-- mostrar-senha -->
					</div><!-- senha -->
					<div>
						<input type="hidden" name="login">
						<input type="submit" value="Entrar">
					</div>
				</form>
			</div><!-- login -->

			<div class="opcoes-tela-branca">
				<div class="line"></div>

				<div class="opcao-cadastro">
					<h2>Caso não seja cadastrado, crie uma conta</h2>
					<a href="<?php echo CAMINHO; ?>cadastro">Cadastre-se</a>
				</div><!-- opcao-cadastro -->
			</div><!-- opcoes-tela-branca -->

			<div class="fechar-janela">
				<img src="<?php echo ASSETS; ?>imagens/x.png">
			</div><!-- fechar-janela -->
		</div><!-- fundo-branco -->
	</div><!-- tela-login -->
</section>