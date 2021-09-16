janelaAviso();

//================================================================
// =============> abre modal de aviso

function janelaAviso(){
	let url = window.location.href;
	let paramsURL = url.split(/[?]/);

	if(paramsURL[1]){
		let modal = document.querySelector('.janela-aviso');

		fadeIn(modal);
		window.scroll(0,0);
		document.querySelector('body').style.overflow = 'hidden';
	}
}