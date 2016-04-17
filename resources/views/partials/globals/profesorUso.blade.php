@extends('layouts.app')

@section('content')

    @include('partials.nav.navWelcome')

     @include('partials.carrousel.carrouselWelcome')



        @include('partials.parallax.parallaxWelcome')

        <!-- Contact information-->
        <div class="container-fluid">

        </div>

        @include('partials.footer.footerWelcome')

@endsection
