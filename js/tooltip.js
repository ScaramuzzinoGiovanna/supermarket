$(document).ready(function () {
    $('[data-toggle="tooltip-password"]').tooltip({
        placement: 'right',
        title: " <strong>Le password devono essere composte da:</strong> minimo 8 e massimo 20 caratteri con almeno una lettera e almeno un numero",
        animation: true,
        html: true
    });

    $('[data-toggle="tooltip-city"]').tooltip({
        placement: 'right',
        title: "La città serve per cercare i prodotti nella tua zona. Potrai modificarla in un secondo momento o fare ricerche in altre zone quando vuoi",
        animation: true,
        html: true
    });
       
    $('[data-toggle="tooltip-location"]').tooltip({
        placement: 'bottom',
        title: " <h6>Imposta località</h6> ",
        animation: true,
        html: true
    });

    $('[data-toggle="tooltip-location2"]').tooltip({
        placement: 'bottom',
        title: "<p>Utilizza posizione attuale<p> ",
        animation: true,
        html: true
    });
});

