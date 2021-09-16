	<footer>
		<div class="container">
			<h2>Todos os direitos reservados</h2>
		</div><!-- container -->
	</footer>
	
	<script type="text/javascript" src="<?php echo ASSETS; ?>javascript/jquery.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS; ?>javascript/constants.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS; ?>javascript/animacoes.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS; ?>javascript/ajax.js"></script>
	<script type="text/javascript" src="<?php echo ASSETS; ?>javascript/arquivo.js"></script>

	<?php
		if(!isset($_SESSION['login'])){
	?>
	<script type="text/javascript" src="<?php echo ASSETS; ?>javascript/modal.js"></script>
	<?php
		}
	?>
</body>
</html>