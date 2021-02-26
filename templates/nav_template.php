<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand btn btn-outline-primary navbutton" href="index.php">SpesaConveniente</a>   
     <!--collapse-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="sr-only">(current)</span>
    </button>
    <!--search bar out collapse mode (mobile)-->
    <div class= col-12 id="search-form-mobile">
    <form  method="post" action="search_view.php">
        <div class="input-group pt-3 pb-3">
            <input class="form-control py-2 border-right-0 border inputSearch" name="search" type="text" id="livesearchMobile" autocomplete="off" placeholder="Cerca prodotti" onkeyup="showResultMobile()" required>
            <span class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                    <img class="" src="images/search.svg" alt="cerca">
                </button>
            </span>

        </div>
    </form>
</div>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item align-self-md-stretch">
                <!-- if not logged - lista -->
                <?php
                if (!isset($_SESSION["id"])) { ?>
                    <a class="btn navbutton xl-md-aligncenter-btn" data-toggle="modal" data-target="#listaModal">Lista della spesa</a>
                    <!-- Modal list -->
                    <div class="modal fade" id="listaModal" tabindex="-1" role="dialog" aria-labelledby="listamodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header w-100 text-center">
                                    <div style="flex-direction:column;">
                                        <h5 class="modal-title " id="exampleModalLongTitle">Lista della spesa</h5>
                                        <p class="textModal">Per creare o modificare la tua lista della spesa:</p>
                                    </div>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body w-100 text-center bodyModalLocation">

                                    <div>
                                        <a class="btn btn-secondary" href="login_view.php">Accedi
                                        </a>
                                    </div>
                                    <p class="marginTop">oppure</p>
                                    <div>
                                        <a class="btn btn-secondary" href="signin_view.php">Registrati
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } else { ?>
                    <!-- if logged - lista -->
                    <a class="btn navbutton xl-md-aligncenter-btn" href="shoppinglist_view.php">Lista della spesa</a>
                <?php
                }
                ?>
            </li>
        </ul>
        <!-- form search -->
        <form class="form-inline my-2 my-lg-0" id="search-form" method="post" action="search_view.php">
            <div class="input-group">
                <input class="form-control py-2 border-right-0 border inputSearch" name="search" type="text" id="livesearch" autocomplete="off" placeholder="Cerca prodotti" onkeyup="showResult()" required>
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                        <img class="" src="images/search.svg" alt="cerca">
                    </button>
                </span>

            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <div class="btn-group" id="geolocation-xl">
                    <!-- Button geolocation trigger modal -->
                    <a data-toggle="tooltip" data-placement="bottom" title="Imposta località">
                        <button class="btn navbutton" data-toggle="modal" data-target="#geoModal">
                            <img class="iconGPS" src="images/geo.png" alt="gps">
                            <input class="navbutton buttonNoBorder text-capitalize" type="submit" id="position" value="<?php if (isset($_SESSION['location'])) {
                                                                                                                            echo $_SESSION['location'];
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        }; ?>" readonly="readonly" />
                        </button>
                    </a>
                    <!--geo alert -->
                    <?php if (!isset($_SESSION["location"])) { ?>
                        <div class="toast show geoAlert" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="images/geo-alt.svg" class="p-1">
                                <strong class="mr-auto">Localizzati</strong>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <a data-toggle="modal" data-target="#geoModal">
                                <div class="toast-body">
                                    <small> Per scoprire i prodotti più convenienti nella tua zona</small>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </li>
            <!-- if not logged -->
            <?php
            if (!isset($_SESSION["id"])) {
            ?>
                <li class="nav-item xl-md-aligncenter-navItem">
                    <a class="btn navbutton" href="login_view.php">Accedi</a>
                </li>
                <li class="nav-item xl-md-aligncenter-navItem">
                    <a class="btn navbutton" href="signin_view.php">Registrati</a>
                </li>

            <?php
            } else { ?>
                <!-- if logged -->
                <li class="nav-item dropdown xl-md-aligncenter-navItem">
                    <a class="dropdown-toggle btn navbutton fixedButton d-inline-block text-truncate " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ciao, <?php echo $_SESSION["name"]; ?> </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="login/logout.php">Esci</a>
                    </div>
                </li>
            <?php
            }
            ?>
            <div class="btn-group" id="geolocation-mobile">
                    <!-- Button geolocation trigger modal -->
                    <a data-toggle="tooltip" data-placement="bottom" title="Imposta località">
                        <button class="btn navbutton" data-toggle="modal" data-target="#geoModal">
                            <img class="iconGPS" src="images/geo.png" alt="gps">
                            <input class="navbutton buttonNoBorder text-capitalize" type="submit" id="position" value="<?php if (isset($_SESSION['location'])) {
                                                                                                                            echo $_SESSION['location'];
                                                                                                                        } else {
                                                                                                                            echo '';
                                                                                                                        }; ?>" readonly="readonly" />
                        </button>
                    </a>
                    <!--geo alert -->
                    <?php if (!isset($_SESSION["location"])) { ?>
                        <div class="toast show geoAlert" data-autohide="false" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header">
                                <img src="images/geo-alt.svg" class="p-1">
                                <strong class="mr-auto">Localizzati</strong>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <a data-toggle="modal" data-target="#geoModal">
                                <div class="toast-body">
                                    <small> Per scoprire i prodotti più convenienti nella tua zona</small>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>

        </ul>
    </div>
</nav>