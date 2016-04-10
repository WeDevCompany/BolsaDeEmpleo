function initialize(){
    var myCenter=new google.maps.LatLng(37.9618960, -1.1332240);
    var mapProp = {
        center:myCenter,
        zoom:15,
        mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var map=new google.maps.Map(document.getElementById("map"),mapProp);

    var marker=new google.maps.Marker({
        position:myCenter,
    });

    marker.setMap(map);

    var infowindow = new google.maps.InfoWindow({
        content:'<b>Instituto educación secundaria ingeniero de la cierva</b><br><i>Carril la Iglesia, s/n<br>30012 Murcia<br>España</i><br><a target="_blank" href="https://maps.google.com/maps?ll=37.961896,-1.133224&z=15&t=m&hl=es-ES&gl=US&mapclient=apiv3&cid=5114021630982515677">Ver en Google Maps</a><br><b>Tlf.: 968266922</b><br><b>Mail: <a href="mailto:30010978@murciaeduca.es">30010978@murciaeduca.es</a></b>'
    });

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map,marker);
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
