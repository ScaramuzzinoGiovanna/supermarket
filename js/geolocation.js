function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function loadGeo() {
    var location = capitalizeFirstLetter(document.getElementById("loc").value)

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "utility/location.php?loc=" + location, true);
    xmlhttp.send();
    document.getElementById("position").value = location;
    document.getElementById("loc").value = ""
    $('.geoAlert').toast('hide');

}


function geo() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, error_callback, { enableHighAccuracy: false });
    } else {
        alert('No geolocalization')
    }
}

function showPosition(pos) {
    var lat = pos.coords.latitude;
    var lon = pos.coords.longitude;
    displayLocation(lat, lon)
}

function displayLocation(latitude, longitude) {
    geopos = [latitude, longitude]
    var result = convertToAddress(geopos);
    //Wait for promise to resolve, then fill var result with the address
    $.when(result).done(function (r) {
        result = r;
        document.getElementById("position").value = result
        $('.geoAlert').toast('hide');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "utility/location.php?loc=" + result, true);
        xmlhttp.send();
    })
}

function convertToAddress(geopos) {
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
    });
    var geocodeService = L.esri.Geocoding.geocodeService();
    //create a deferred object (promise)
    var defObject = $.Deferred();
    geocodeService.reverse().latlng(geopos).run(function (error, result) {
        //resolve promise
        defObject.resolve(result.address.City)//address.Match_addr);

    })
    //return promise object
    return defObject.promise();

}

function error_callback(error) {
    switch (error.code) {

        case error.PERMISSION_DENIED:
            console.log("Permesso negato dall'utente");
            alert('Spiacenti! Hai negato l\'autorizzazione per la Geolocalizzazione')
            //document.getElementById("position").value = "Cerca posizione"
            position.style.color = '#989898';
            break;
        case error.POSITION_UNAVAILABLE:
            console.log("Impossibile determinare la posizione corrente");
            //document.getElementById("position").value = "Cerca posizione"
            position.style.color = '#989898';
            break;
        case error.TIMEOUT:
            console.log("Il rilevamento della posizione impiega troppo tempo");
            //document.getElementById("position").value = "Cerca posizione"
            position.style.color = '#989898';
            break;
        case error.UNKNOWN_ERROR:
            console.log("Si è verificato un errore sconosciuto");
            //document.getElementById("position").value = "Cerca posizione"
            position.style.color = '#989898';
            break;
    }
}
//geo-alert active
$('.geoAlert').toast('show');