
    <header class="header-admin">

        <!-- Navbar -->
        <!--Navbar-->
        <nav class="double-navbar navbar black navbar-static-top z-depth-1" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header pull-left">
                    <!-- SideNav slide-out button -->
                    <a href="#" data-activates="slide-out" class="button-collapse hidden-lg hidden-md"><i class="fa fa-bars"></i></a>
                    <!--/. SideNav slide-out button -->
                    <div class="breadcrumbs hidden-xs hidden-sm">
                        <h6>MDB Magazine Template</h6>
                    </div>
                </div>

                <!-- Navbar Icons -->
                <ul class="list-inline pull-right text-center">
                    <li><a href="#" class="waves-effect waves-light" data-toggle="modal" data-target="#contact-form"><i class="fa fa-envelope"></i><br><span>Contact</span></a></li>
                    <li><a href="#" class="waves-effect waves-light"><i class="fa fa-book"></i><br><span>Blog</span></a></li>
                    <li><a href="#" class="waves-effect waves-light"><i class="fa fa-map"></i><br><span>Shop</span></a></li>
                    <li><a href="#" class="waves-effect waves-light" data-toggle="modal" data-target="#cart-modal"><i class="fa fa-shopping-cart"></i><br><span>Cart</span></a></li>
                    <!--Main acocunt with dropdown-->
                    <li><a href="#" class="waves-effect waves-light dropdown-button" data-activates="account"><i class="fa fa-user"></i><br><span>Account</span></a>
                        <!-- Account Dropdown -->
                        <ul id='account' class='dropdown-content'>
                            <li><a href="#!">Login</a></li>
                            <li><a href="#!">Logout</a></li>
                            <li><a href="#!">Settings</a></li>
                        </ul>
                        <!-- /.Account Dropdown -->
                    </li>
                    <!--/.Main acocunt with dropdown-->

                </ul>
                <!--/. Navbar Icons -->
            </div>
        </nav>
        <!--/.Navbar-->
        <!--/. Navbar -->

    </header>

    <!-- Sidebar navigation -->
    <ul id="slide-out" class="side-nav fixed admin-side-nav light-side-nav">
        <!-- Logo -->
        <div class="logo-wrapper">

            <img src="{{ url('/img/imgUser/' . \Auth::user()->carpeta . '/' .  \Auth::user()->image) }}" alt="Imagen de perfil" class="img-responsive img-circle img-navegador">
            
            <div class="rgba-stylish-strong"><p class="user white-text">Admin<br>
            admin@gmail.com</p></div>

        </div>
        <!--/. Logo -->

        <!-- Side navigation links -->
        <ul class="collapsible collapsible-accordion">
            <li><a href="#" class="waves-effect"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#" class="waves-effect"><i class="fa fa-money"></i> Sales</a></li>
            <li><a href="#" class="waves-effect"><i class="fa fa-line-chart"></i> Conversion</a></li>
            <li><a href="#" class="waves-effect"><i class="fa fa-users"></i> Website Traffic</a></li>
            <li><a href="#" class="waves-effect"><i class="fa fa-search"></i> SEO</a></li>
            <li><a href="#" class="waves-effect"><i class="fa fa-share-alt"></i> Social</a></li>
        </ul>
        <!--/. Side navigation links -->

    </ul>
    <!--/. Sidebar navigation -->






    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Material Design Bootstrap -->
    <script type="text/javascript" src="js/mdb.min.js"></script>

    <script>
        // Initialize collapse button
        $(".button-collapse").sideNav();
        // Initialize collapsible (uncomment the line below if you use the dropdown variation)
        $('.collapsible').collapsible();
    </script>

