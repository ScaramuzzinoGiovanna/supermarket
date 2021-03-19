<?php
session_start();
include("templates/head_template.php");
?>

<meta name="description" content="Supermarket products" />

<title>Home</title>
</head>

<body>
    <?php include("templates/nav_template.php"); ?>

    <div class="container containerPaddingMargin">
        <h2 class="title">Catalogo prodotti presenti nei supermercati di Italia</h3>
        <div class='container containerPadding300'>
        <h6 class="text-left pb-3"> Per ogni prodotto puoi osservare il supermercato con il prezzo più conveniente. </h6> 
        <p class="text-left"> <img clas src ="images/search-black.svg" alt="cerca"> &nbsp Cerca all'interno del nostro catalogo i prodotti
            desiderati. 
        <p class="text-left">  <img clas src ="images/geo-alt.svg" alt="geolocalizzazione">  &nbsp Localizzati per trovare i prodotti disponibili nella tua zona. 
        <p class="text-left"> <img class src="images/plus-circle.svg" alt="aggiungi prodotto">  &nbsp Aggiungi i prodotti alla lista della spesa. È necassaria la registrazione al sito.</p>
        <div>
    </div>
    <?php include("templates/script_template.php"); ?>


</body>

</html>