jQuery(document).foundation();

jQuery(document).on('ready',function(){
	var elemento = jQuery('.orbit');
	var opciones = {
		animInFromRight : 'fade-in',
		animInFromLeftt : 'fade-in',
		animOutToLeft:'fade-out',
		animOutToRight:'fade-out',
	}
	var slider =  new Foundation.Orbit(elemento,opciones);
});
