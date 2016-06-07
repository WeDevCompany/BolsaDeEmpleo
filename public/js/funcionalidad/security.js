var error;
$(window).load(function(){
    if (!$.session.get('error') ){
        $.session.set("error", 0);
        error = 0;
    } else {
        error = $.session.get('error');
        error++;
        $.session.set("error",error);
        if( $.session.get('error')  > 3) {
            alert('Has intentado más de 3 veces acceder a un página que no existe, a partir de ahora se logearán todos sus movimientos');
             $.session.remove('error');
            window.location.href = '/';
        }
    }
});