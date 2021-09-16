<?php
	namespace Classes\Controllers;

	use Classes\Views\puxarViews;
	
	use Classes\Metodos;
	use Classes\MySql;

	use Classes\Models\UsuariosModel;

	class CadastroController{

		public function index(){

			$data = null;

			if(isset($_POST['cadastro'])){
				$nome = $_POST['nome'];
				$email = $_POST['email-cadastro'];
				$senha = $_POST['senha-cadastro'];
				$endereco = $_POST['endereco'];
				$telefone = $_POST['telefone'];
				$tipo_usuario = 1;
				$pasta = 'usuarios';

				if($nome == ''){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'O nome não foi inserido!'];
				}else if($email == ''){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'O e-mail não foi inserido!'];
				}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'E-mail inválido!'];
				}else if(UsuariosModel::verificarUsuario($email) == false){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'Usuário já cadastrado!'];
				}else if($endereco == ''){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'O endereço não foi inserido!'];
				}else if($telefone == ''){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'O telefone não foi inserido!'];
				}else if(!preg_match('/^(\([0-9]{2}\)|)\s?[1-9]{4,5}-[0-9]{4}$/',$telefone)){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'Número de telefone inválido!'];
				}else if($senha == ''){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'A senha não foi inserida!'];
				}else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])[0-9A-Za-z-_.!@#%?]{8,}$/',$senha)){
					// feedback do formulário
					$data = ['type' => 'erro','mensagem' => 'Senha inválida!'];
				}else{
					if($_FILES['foto']['name'] != ''){
						if(Metodos::validateImage($_FILES['foto']) == true){
							$pastaUsuario = $nome;

							$foto = Metodos::uploadImage($_FILES['foto'],$pasta,$pastaUsuario);
							$senha = Bcrypt::hash($senha);

							//inserindo no banco de dados
							$sql = MySql::conexaobd()->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?,?,?,?,?)");
							$sql->execute(array($nome,$email,$endereco,$telefone,$senha,$foto,$tipo_usuario));

							// feedback do formulário
							$data = ['type' => 'sucesso','mensagem' => 'Usuário cadastrado com sucesso!'];
						}else{
							// feedback do formulário
							$data = ['type' => 'erro','mensagem' => 'Imagem inválida!'];
						}
					}else{
						$senha = Bcrypt::hash($senha);
						$foto = 0;

						//inserindo no banco de dados
						$sql = MySql::conexaobd()->prepare("INSERT INTO `usuarios` VALUES (null,?,?,?,?,?,?,?)");
						$sql->execute(array($nome,$email,$endereco,$telefone,$senha,$foto,$tipo_usuario));
						
						// feedback do formulário
						$data = ['type' => 'sucesso','mensagem' => 'Usuário cadastrado com sucesso!'];
					}
				}
			}

			puxarViews::renderizar('tela_inicial/cadastro',$data);
		}
	}
?>