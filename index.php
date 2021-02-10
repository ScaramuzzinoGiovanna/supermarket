<?php
session_start();
include("templates/head_template.php");
?>

<meta name="description" content="Supermarket products" />

<title>Home</title>
</head>

<body>
    <?php include("templates/nav_template.php"); ?>

    <div>
        <h3 class="title">Catalogo prodotti presenti nei supermercati di Italia</h3>
        <p class="subtitle">Cerca all'interno del nostro catalogo e crea la tua lista della spesa selezionando i prodotti
            desiderati.<br>
            Per ogni prodotto puoi osservare il supermercato con il prezzo più conveniente</p>

        <!--    <form class="form-inline my-2 my-lg-0 search">-->
        <!--      <input class="form-control mr-sm-2 col-sm-10" type="text" placeholder="Cerca prodotti">-->
        <!--      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Cerca</button>-->
        <!--    </form>-->
    </div>
    <?php include("templates/script_template.php"); ?>


</body>

</html>