$(window).load(function() {
	// Iniciamos el spin
	spin.spinOn('N', '', true, 'resultado');
	// Lanzamos la peticion para obtener el número de notificaciones
    ajax.callAjax('GET', '/json/notifications', 'getNotifications', 'addNotifications');
});