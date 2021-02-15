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
        <div class="card">
            <div class="jumbotron-fluid">
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
                <div class="preview col-md-6">
                    <img class="prodImg" src="<?php echo $prodImg ?>">
                </div>
                <div class="details col-md-6">
                    <h1 class="product-title"><?php echo $prodName ?> </h1>
                </div>
            </div>
            <hr class="my-8">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th scope="col">Supermercato</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Prezzo (€)</th>
                        <th scope="col">Quantità</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arr as $prod) { ?>
                        <tr class="table-default">
                            <td scope="row"><img class='super-logo' src="<?php echo $prod[0] ?>"></td>
                            <td scope="row"><?php echo $prod[1]?>, <?php echo $prod[2]?> </td>
                            <td><?php echo $prod[4]?></td>
                            
                            <td> <div class="form-group">
                                <form>
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                </select>
                                </form>
                            </td>
                            <td>
                                <a class="btn btn-lg px-4 add" role="button" onclick="addToList()"> <img type="button" data-toggle="tooltip-lista" src="images/plus-circle.svg" height="30" alt="aggiungi alla lista"></a>
                            </td>
  </div>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
    </div>
<?php include("templates/script_template.php"); ?>
</body>

</html>