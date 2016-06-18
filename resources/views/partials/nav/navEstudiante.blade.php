<!-- Estudintes -->
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Ofertas<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="ofertas">
        <li><a href="{{ url(config('routes.student.allOffers')) }}"><i class="fa fa-cart-plus right" aria-hidden="true"></i> Todas</a></li>
        <li><a href="{{ url(config('routes.student.allOffersSubscribed')) }}"><i class="fa fa-check right" aria-hidden="true"></i> Suscipciones</a></li>
    </ul>
</a></li>
