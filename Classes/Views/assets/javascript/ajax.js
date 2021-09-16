FetchLogin();

//================================================================
//ajax do login

function FetchLogin(){
	const login = document.getElementById('login');

	if(login){
		login.addEventListener('submit', (event) => {
			event.preventDefault();

			//parâmetros FETCH
			const pathFetch = asset+'ajax/dados.php';
			const body = new FormData(login);

			//bloqueia formulário até a requisição ser completada
			event.target.style.transitionProperty = 'opacity';
			event.target.style.transitionDuration = '1000ms';
			event.target.style.opacity = '0.5';

			let input = event.target.querySelector('input[type=submit]');

			input.setAttribute('disabled','true');
			input.style.cursor = 'wait';

			//requisição FETCH
			fetch(pathFetch, {
				method:'post',
				body
			})
			.then((response) => response.json())
			.then((data) => {
				//volta o formulário ao normal
				event.target.style.transitionProperty = 'opacity';
				event.target.style.transitionDuration = '1500ms';
				event.target.style.opacity = '1';

				let input = event.target.querySelector('input[type=submit]');

				input.removeAttribute('disabled');
				input.style.cursor = 'pointer';

				//função do feedback
				mostrarResposta(event.target, data);
			})
			.catch((error) => console.log(error));
		});
	}
}

//================================================================
//mostra feedbacks do FETCH

function mostrarResposta(nomeDiv,resposta){
	if(resposta.sucesso == true){
		//verifica se a classe existe
		let aviso = document.querySelector('.erro-mensagem');

		if(document.contains(aviso) == true){
			aviso.style.display = 'none';
		}

		//mostra mensagem
		let content = '<div style="padding:10px; margin: 0 0 10px 0;" class="sucesso-mensagem"><h3><i class="fas fa-check-circle"></i></h3><h2>'+resposta.mensagem+'</h2></div>';
		
		nomeDiv.insertAdjacentHTML('afterBegin',content);
	}else if(resposta.login == true){
		//verifica se a classe existe
		let aviso = document.querySelector('.erro-mensagem');

		if(document.contains(aviso) == true){
			aviso.style.display = 'none';
		}

		//reseta formulário
		nomeDiv.reset();

		//redireciona
		let url = window.location.href;

		location.href = url;
	}else{
		//verifica se a classe existe
		let aviso = document.querySelector('.erro-mensagem');

		if(document.contains(aviso) == true){
			aviso.style.display = 'none';
		}

		//mostra mensagem
		let content = '<div style="padding:10px; margin: 0 0 10px 0;" class="erro-mensagem"><h3><i class="fas fa-exclamation-triangle"></i></h3><h2>'+resposta.mensagem+'</h2></div>';
		
		nomeDiv.insertAdjacentHTML('afterBegin',content);
	}
}