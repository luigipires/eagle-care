abrirMenuMobile();
abrirModalLogin();
fecharModalLogin();
mostrarSenha();
uploadArquivos();
tooltip();

//================================================================
// =============> abre o menu mobile

function abrirMenuMobile(){
	let icone_MenuMobile = document.querySelector('.menu-mobile');
	let menuMobile = document.querySelector('.corpo-menu-mobile');

	icone_MenuMobile.addEventListener('click', () => {
		animacaoSlide(menuMobile,400);
	});
}

//================================================================
// =============> abre e fecha modal de login

function abrirModalLogin(){
	let modal = document.querySelectorAll('[login]');
	let telaLogin = document.querySelector('.tela-login');

	for(let i = 0; i < modal.length; i++){
		modal[i].addEventListener('click', () => {
			document.querySelector('.corpo-menu-mobile').style.display = 'none';
			fadeIn(telaLogin);
			window.scroll(0,0);
			document.querySelector('body').style.overflow = 'hidden';
		});
	}
}

function fecharModalLogin(){
	let modal = document.querySelectorAll('.fechar-janela>img');
	let telaLogin = document.querySelector('.tela-login');

	if(modal){
		for(let i = 0; i < modal.length; i++){
			modal[i].addEventListener('click', () => {
				fadeOut(telaLogin);
				// $('.window-success').fadeOut();
				// $('.window-warning').fadeOut();
				document.querySelector('body').style.overflow = 'auto';
			});
		}
	}
}

//================================================================
// =============> mostrar e ocultar senha

function mostrarSenha(){
	let senha = document.querySelectorAll('.mostrar-senha>h3');

	for(let i = 0; i < senha.length; i++){
		senha[i].addEventListener('click', (e) => {
			let classePrincipal = e.target.parentElement.parentNode.parentElement;
			let tipoInput = classePrincipal.querySelector('input').getAttribute('type');
			let input = classePrincipal.querySelector('input');
			let icone = e.target.parentElement.firstChild;

			if(tipoInput == 'password'){
				input.setAttribute('type','text');
				icone.setAttribute('class','fas fa-eye-slash');
			}else{
				input.setAttribute('type','password');
				icone.setAttribute('class','fas fa-eye');
			}
		});
	}
}

//================================================================
// =============> pegando valor do input file e mandando para a label

function uploadArquivos(){
	let inputFile = document.querySelector('input[id=foto]');
	let label = document.querySelector('label[for=foto]');

	if(inputFile){
		inputFile.addEventListener('change', (e) => {
			label.textContent = e.target.value.split('\\').pop();
		});
	}
}

//================================================================
// =============> hover do tooltip

function tooltip(){
	let tooltip = document.querySelector('.tooltip>h3');
	let texto_tooltip = document.querySelector('.text-tooltip>div');

	hover(tooltip,texto_tooltip);
}