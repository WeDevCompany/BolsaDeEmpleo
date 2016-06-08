



// Objeto de familyCycles
    var cities = {

    	addCity: function (json, identifier) {

            // Si la variable variable no esta definida, devuelvo false.
            if (typeof json == "undefined" || typeof identifier == "undefined"){
                return false;
            } else {

            	$('#'+identifier).append(
            		'<div id="citie-div">' +
            			'<select name="citie" class="chosen-select form-control" id="citie"></select>' +
            		'</div>'
                );

                // Por cada familia añadimos un option al select de familias profesionales
                result = $.each(json, function(index, cityObj){
                    if (typeof index == "undefined" || typeof cityObj == "undefined") {
                        return false;
                    } else {
                        $('#citie').append('<option value="' + cityObj.id + '">' + cityObj.name + '</option>');
                    }
                });

            	// Actualizamos chosen
                $(".chosen-select").chosen({ width: "95%" });
            }
        }
    };