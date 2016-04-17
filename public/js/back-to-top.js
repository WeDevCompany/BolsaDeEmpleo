// hacemos que aparezca el botón
$('body').prepend('<a href="#" id="back-to-top" class="btn back-to-top waves-effect waves-light">Back to Top</a>');
// cantidad de scroll en la que aparecerá el botón
var amountScrolled = 300;
// cuando se realice el scroll
$(window).scroll(function() {
	// si se su peran la cantidad minima para que aparezca el scroll
	// lo mostrará
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
	} else {	// sino lo esconderá
		$('a.back-to-top').fadeOut('slow');
	}
});
// La animación que tendá el botón
$('a.back-to-top').click(function() {
	$('html, body').animate({
		scrollTop: 0
	},"slow");
	return false;
});
