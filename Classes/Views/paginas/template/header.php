<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">

	<!-- links -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo ASSETS; ?>css/styleError.css">

	<title>EagleCare</title>

	<!-- ================= meta-tags ===================== -->

	<!-- responsivo -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">

	<!-- SEO -->
	<meta name="keywords" content="palavras-chave,do,meu,site">
	<meta name="description" content="Descrição do meu website">
	<meta name="author" content="autor do site">

	<!-- SMO -->
	<meta property="og:title" content="título do seu site">
	<meta property="og:site_name" content="nome do seu site">
	<meta property="og:description" content="descrição do seu site">
	<meta property="og:url" content="url do seu site">
	<meta property="og:image" content="imagem/foto do seu site">
	<meta property="og:image:type" content="tipo da imagem/foto do seu site">
</head>
<body>
	<base base="<?php echo CAMINHO; ?>" />

	<header>
		<div class="container">
			<div class="logo">
				<a title="Página Inicial" href="<?php echo CAMINHO; ?>">
					<h1><i>EAGLECARE</i></h1>
				</a>
			</div><!-- logo -->

			<nav class="menu-desktop">
				<ul>
					<li>
						<i class="fas fa-shopping-cart"></i>
						<?php
							if(isset($_SESSION['carrinho'])){
						?>
						<a href="<?php echo CAMINHO; ?>finalizar-pedido">Carrinho ( <?php echo count($_SESSION['carrinho']); ?> )</a>
						<?php
							}else{
						?>
						<a>Carrinho</a>
						<?php
							}
						?>
					</li>

					<?php
						if(!isset($_SESSION['login'])){
					?>
					<li><a login>Entrar</a></li>
					<?php
						}else{
					?>
					<li><a><?php echo ucfirst($_SESSION['nome']); ?></a></li>
					<li><a title="Sair" href="<?php echo CAMINHO; ?>?sair">Sair</a></li>
					<?php
						}
					?>
				</ul>
			</nav><!-- menu-desktop -->

			<nav class="menu-mobile">
				<h3><i class="fas fa-bars"></i></h3>
			</nav><!-- menu-mobile -->
		</div><!-- container -->
	</header>

	<section>
		<div class="corpo-menu-mobile">
			<nav>
				<ul>
					<li>
						<i class="fas fa-shopping-cart"></i>

						<?php
							if(isset($_SESSION['carrinho'])){
						?>
						<a href="<?php echo CAMINHO; ?>finalizar-pedido">Carrinho ( <?php echo count($_SESSION['carrinho']); ?> )</a>
						<?php
							}else{
						?>
						<a>Carrinho</a>
						<?php
							}
						?>
					</li>
					
					<?php
						if(!isset($_SESSION['login'])){
					?>
					<li><a login>Entrar</a></li>
					<?php
						}else{
					?>
					<li><a><?php echo ucfirst($_SESSION['nome']); ?></a></li>
					<li><a title="Sair" href="<?php echo CAMINHO; ?>?sair">Sair</a></li>
					<?php
						}
					?>
				</ul>
			</nav>
		</div><!-- corpo-menu-mobile -->
	</section>
