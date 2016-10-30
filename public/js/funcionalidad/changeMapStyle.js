$('document').ready(function(){
    map = $('#map');
    if (map.length > 0) {
        // si existe le generamos un evento
        divs = map.find(div)[0];

        $$.each(divs, function(index, val) {
             divs.css({
                 position: 'relative'
             });
        });
    }
});