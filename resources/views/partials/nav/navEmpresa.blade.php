<!-- Empresas -->
<li class = "dropdown">
    <a href="#" class="dropdown-toggle subrayado " data-toggle="dropdown" role="button" aria-expanded="false">
     Ofertas<span class="caret"></span>
    </a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="ofertas">
        <li><a href="{{ url(config('routes.offerEnterprise.allOffers')) }}"><i class="fa fa-cart-plus right" aria-hidden="true"></i> Mis ofertas</a></li>
        <li><a href="{{ url(config('routes.offerEnterprise.newOffer')) }}"><i class="fa fa-plus right" aria-hidden="true"></i> Nueva oferta</a></li>
    </ul>
</a></li>