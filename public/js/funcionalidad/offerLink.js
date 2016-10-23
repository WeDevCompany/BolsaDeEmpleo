
        $(document).ready(function () {

           $('.father-link').on('click', function () {
                var link = $(this).children('.offer-link').attr('href');
                window.location.href = link;
           });

        });
