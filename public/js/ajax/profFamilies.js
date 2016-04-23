$(document).ready(function () {
    // inicializamos el plugin
    $('#family').selected({
        ajax: {
            dataType: 'json',
            url: '{{ url("profFamilies") }}',
            delay: 250,
            data: function(params) {
                return {
                    term: params.term
                }
            },
            processResults: function (data, page) {
              return {
                results: data
              };
            },
        }
    });
});