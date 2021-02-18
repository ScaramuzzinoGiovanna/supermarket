<?php
include("utility/product.php");
include("templates/head_template.php");
?>
<meta name="description" content="Supermarket products" />

<title><?php echo $prodName ?></title>
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
    <div class="container containerPaddingMargin">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="jumbotron-fluid">
            <div class="row">
                <!--product not found-->
                <?php if ($productError != "") { ?>
                    <div class="preview col-md-6">
                        <img class="prodImg" src="images/exclamation-triangle.svg">
                    </div>
                    <div class="details col-md-6">
                        <div class="row align-items-center h-100">
                            <h1 class="product-title"> <?php echo $productError ?></h1>
                        </div>
                    </div>
                <?php } else { ?>
                    <!--product found-->
                    <div class="preview col-4">
                        <img class="prodImg" src="<?php echo $prodImg ?>">
                    </div>
                    <div class="details col-6">
                        <h1 class="product-title"><?php echo $prodName ?> </h1>
                    </div>
                    </div>
            </div>
            <hr class="my-8">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th class="col-2">Supermercato</th>
                        <th class="col-2">Indirizzo</th>
                        <th class="col-2">Prezzo (€)</th>
                        <th class="col-2">Quantità</th>
                        <th class="col-2"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr as $prod) { ?>
                        <tr class="table-default">
                            <td class="col-2"><img class='super-logo' src="<?php echo $prod[0] ?>"></td>
                            <td class="col-2"><?php echo $prod[1] ?>, <?php echo $prod[2] ?> </td>
                            <td class="col-2"><?php echo $prod[4] ?></td>
                            <td class="col-2">
                                <div class="form-group">
                                    <form>
                                        <select class="form-control-xs" id="exampleFormControlSelect1">
                                            <?php for ($i = 1; $i <= 100; $i++) { ?>
                                                <option><?php echo $i ?> </option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </div>
                            </td>
                            <td class="col-2">
                                <a class="btn btn-lg px-4 add" role="button" onclick="addToList(<?php echo $prod[5] ?>)"> <img type="button" data-toggle="tooltip-lista" src="images/plus-circle.svg" height="30" alt="aggiungi alla lista"></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        </div>
                                            </div>
    </div>
    <?php include("templates/script_template.php"); ?>
    <script type="text/javascript" src="js/addToList.js"></script>

</body>

</html>