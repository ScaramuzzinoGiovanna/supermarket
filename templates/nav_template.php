<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand btn btn-outline-primary navbutton" href="index.php">SpesaConveniente</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        <span class="sr-only">(current)</span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn navbutton" href="#">Lista della spesa</a>
            </li>
            <li class="nav-item">
                <a class="btn navbutton" href="#">Contatti</a>
            </li>
        </ul>
        <!-- form search -->
        <form class="form-inline my-2 my-lg-0 " method="post" action="search_view.php">
            <div class="input-group">
                <input class="form-control py-2 border-right-0 border inputSearch" name="search" type="text" id="livesearch" autocomplete="off" placeholder="Cerca prodotti" onkeyup="showResult()" required>
                <span class="input-group-append">
                    <button class="btn btn-outline-secondary border-left-0 border" type="submit">
                        <img class="" src="images/search.svg" alt="cerca">
                    </button>
                </span>

            </div>
        </form>
        <ul class="navbar-nav">
            <!-- if not logged -->
            <?php
            if (!isset($_SESSION["id"])) {
            ?>

                <li class="nav-item">
                    <div class="">
                        <button class="btn navbutton" onclick="geo()">
                            <img class="iconGPS" src="images/geo.png" alt="gps">
                            <input class="navbutton buttonNoBorder" type="submit" id="position" value="" readonly="readonly" placeholder="Cerca posizione" />
                        </button>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="btn navbutton" href="login_view.php">Accedi</a>
                </li>
                <li class="nav-item">
                    <a class="btn navbutton" href="signin_view.php">Registrati</a>
                </li>

            <?php
            } else { ?>
                <!-- if logged -->
                <li class="nav-item">
                    <div class="">
                        <!-- Button trigger modal -->
                        <button class="btn navbutton" data-toggle="modal" data-target="#geoModal">
                            <img class="iconGPS" src="images/geo.png" alt="gps">
                            <input class="navbutton buttonNoBorder" type="submit" id="position" value=" <?php echo $_SESSION["location"] ?> " readonly="readonly" placeholder="Cerca posizione" />
                        </button>
                    </div>
                </li>
                <!-- Modal -->
                <div class="modal fade" id="geoModal" tabindex="-1" role="dialog" aria-labelledby="geoModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header w-100 text-center">
                                <div style="flex-direction:column;">
                                    <h5 class="modal-title " id="exampleModalLongTitle">Modifica la tua posizione</h5>
                                    <p>per scoprire dove acquistare i prodotti più convenienti nella tua zona:
                                    <p>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body w-100 text-center bodyModalLocation">
                                <div class="input-group mb-2">
                                    <input class="form-control py-2 pinkInput" type="text" id="loc" name='loc' autocomplete="off" placeholder="Inserisci la tua località">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary border-left-0 border" data-dismiss="modal" type="button" onclick="loadGeo()">
                                            Invio
                                        </button>
                                    </span>
                                </div>
                                <p>oppure</p>
                                <div class="">
                                    <button class="btn btn-secondary" data-dismiss="modal" onclick="geo()">
                                        <img class="iconGPS" src="images/geo.png" alt="gps">
                                        Geolocalizzati
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <li class="nav-item dropdown">
                    <a class="dropdown-toggle btn navbutton" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Ciao, <?php echo $_SESSION["name"]; ?></a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="login/logout.php">Esci</a>
                    </div>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>

</nav>