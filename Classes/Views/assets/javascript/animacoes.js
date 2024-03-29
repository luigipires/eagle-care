/********************************************/
// slideToggle em javascript puro

let slideUp = (target,duration = 500) => {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.setAttribute('target','none');
    
    window.setTimeout(() => {
      target.style.display = 'none';
      // target.removeAttribute('style');
      target.style.removeProperty('height');
      target.style.removeProperty('padding-top');
      target.style.removeProperty('padding-bottom');
      target.style.removeProperty('margin-top');
      target.style.removeProperty('margin-bottom');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    },duration);
};

let slideDown = (target,duration = 500) => {
    target.style.removeProperty('display');

    let display = window.getComputedStyle(target).display;

    if(display === 'none'){
    	display = 'block';
    }

    target.style.display = display;
    let height = target.offsetHeight;
    target.setAttribute('target','block');

    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');

    window.setTimeout(() => {
  		target.style.removeProperty('height');
  		target.style.removeProperty('overflow');
  		target.style.removeProperty('transition-duration');
  		target.style.removeProperty('transition-property');
    },duration);
};

let animacaoSlide = (target,duration = 500) => {
	if(window.getComputedStyle(target).display === 'none'){
		return slideDown(target,duration);
	}else{
		return slideUp(target,duration);
	}
}


/********************************************/
// fadeOut e fadeIn em javascript puro

function fadeOut(element){
    element.style.opacity = 1;

    (function fade(){
        if((element.style.opacity -= .1) < 0){
            // element.style.transitionProperty = 'display';
            // element.style.transitionDuration = '3000ms';
            element.style.display = "none";
        }else{
            requestAnimationFrame(fade);
        }
    })();
};

function fadeIn(element, display){
    element.style.opacity = 0;
    element.style.display = display || "block";

    (function fade(){
        let val = parseFloat(element.style.opacity);

        if(!((val += .1) > 1)){
          element.style.opacity = val;
          requestAnimationFrame(fade);
        }
    })();
};

/********************************************/
// hover em javascript puro

function hover(element, element2){
    if(element && element2){
        element.addEventListener('mouseover', () => {
            fadeIn(element2);
        }, false);

        element.addEventListener('mouseout', () => {
            fadeOut(element2);
        }, false);
    }
}