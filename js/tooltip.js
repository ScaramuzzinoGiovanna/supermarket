 $(document).ready(function () {
        $('[data-toggle="tooltip-password"]').tooltip({
            placement: 'right',
            title: " <h6>Le password devono essere composte da:</h6> <ul> <li> almeno un carattere e almeno un numero,</li><li> minimo 8 </li><li> massimo 20</li>",
            animation: true,
            html: true
        });
    });

 $(document).ready(function () {
        $('[data-toggle="tooltip-lista"]').tooltip({
            placement: 'bottom',
            title: " <h6> Aggiungi alla lista</h6>",
            animation: true,
            html: true
        });
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip-location"]').tooltip({
            placement: 'bottom',
            title: " <h6>Imposta località</h6> ",
            animation: true,
            html: true
        });
    });