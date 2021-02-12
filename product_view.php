<?php
include("templates/head_template.php");
include("utility/product.php");
?>
<meta name="description" content="Supermarket products" />

<title>Nome_prodotto</title>
</head>
<body>
<?php include("templates/nav_template.php"); ?>
<!--<div class="col-md-6">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="search_view.php">ALimenti</a></li>
        <li class="breadcrumb-item active">Nome_prodotto</li>
    </ol>
</div>-->
<div class="container">
    <div class="card">
        <div class="jumbotron-fluid">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <img src="<?php echo $prodImg ?>" alt="pomodori">
                </div>
                <div class="details col-md-6">
                    <h1 class="product-title"><?php echo $prodName ?> </h1>
                </div>
            </div>
            <hr class="my-4">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Supermercato</th>
                    <th scope="col">Prezzo</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($arr as $prod) { ?>
                <tr class="table-default">
                    <th scope="row"><img class='super-logo' src="<?php echo $prod[0] ?>"></th>
                    <td>_prezzo_</td>
                    <td>
                        <a class="btn btn-lg px-4 add" href="#" role="button"> <img type="button"
                                                                                    data-toggle="tooltip-lista"
                                                                                    src="images/plus-circle.svg"
                                                                                    height="30"
                                                                                    alt="aggiungi alla lista"></a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("templates/script_template.php"); ?>
</body>

</html>