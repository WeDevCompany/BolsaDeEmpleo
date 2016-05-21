$('document').ready(function(){
	imgPerfil = $('#img_perfil');
	if (imgPerfil.length > 0) {
		// si existe le generamos un evento
		imgPerfil.mouseover(function(){
			// cuando se le pase el raton por encima
			// Esto se esta haciendo porque en dispositivos moviles
			// el hover no funciona
			imgPerfil.attr('style', 'background:white;');
		});

		imgPerfil.mouseout(function(){
			imgPerfil.removeAttr('style', 'background:white;')
		});
	}
});