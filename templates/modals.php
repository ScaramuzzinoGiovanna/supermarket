<!-- Modal geolocation -->
<div class="modal fade" id="geoModal" tabindex="-1" role="dialog" aria-labelledby="geoModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header w-100 text-center">
                <div style="flex-direction:column;">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifica la tua posizione</h5>
                    <p>Per scoprire dove acquistare i prodotti più convenienti nella tua zona:</p>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body w-100 text-center bodyModalLocation">
                <div class="input-group mb-2">
                    <input class="form-control py-2 pinkInput" type="text" id="loc" name='loc' autocomplete="off" required="" placeholder="Inserisci la tua località">
                    <span class="input-group-append">
                        <button class="btn btn-secondary border-left-0 border" id="loadGeoButton" type="button" onclick="loadGeo()">
                            Invio
                        </button>
                    </span>
                </div>
                <p>oppure</p>
                <div class="">
                    <button class="btn btn-secondary" data-dismiss="modal" onclick="geo()" data-toggle="tooltip-location2">
                        <img class="iconGPS" src="images/geo.png" alt="gps">
                        Geolocalizzati
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal no logged- no add to list -->
<div class="modal fade" id="prodNoLoggedModal" tabindex="-1" role="dialog" aria-labelledby="prodNoLoggedModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header w-100 text-center">
                <div style="flex-direction:column;">
                    <h5 class="modal-title"> Non puoi ancora aggiungere elementi alla lista:</h5>
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