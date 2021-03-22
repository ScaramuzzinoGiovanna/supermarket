<?php
include("utility/product.php");
include("templates/head_template.php");
?>
<meta name="description" content="Supermarket products" />

<title><?php echo $prodName ?></title>
</head>

<body>
    <?php include("templates/nav_template.php"); ?>
    <div class="container containerPaddingMargin">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="jumbotron-fluid">
                    <div class="row align-self-center">
                        <!--product not found-->
                        <?php if ($productError != "") { ?>
                            <div class="preview col-md-6 align-self-center">
                                <img class="prodImg" src="images/exclamation-triangle.svg">
                            </div>
                            <div class="details col-md-6 align-self-center">
                                <div class="row align-items-center h-100">
                                    <h1 class="product-title"> <?php echo $productError ?></h1>
                                </div>
                            </div>
                        <?php } else { ?>
                            <!--product found-->
                            <div class="preview paddingTop col-3 align-self-center">
                                <img class="prodImg" src="<?php echo $prodImg ?>">
                            </div>
                            <div class="details col-9 align-self-center">
                                <h1 class="product-title"><?php echo $prodName ?> </h1>
                            </div>
                    </div>
                </div>
                <?php if (isset($_SESSION["location"])) { ?>

                    <hr class="my-8">
                    <div class="table-responsive">
                        <table class="table mb-0" id="table-prod">
                            <thead>
                                <tr class="table-secondary">
                                    <th rowspan="2" class="col-6 text-center align-top">Supermercato</th>
                                    <th class="col-2 text-center align-top">Prezzo (€)</th>
                                    <th class="col-2 text-center align-top">Quantità</th>
                                    <th class="col-2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- product not found in selected city -->
                                <?php if (empty($arr)) { ?>
                                    <tr class="table-default">
                                        <td colspan=4>
                                            <h5> Ci dispiace, non abbiamo informazioni disponibili per la tua città </h5>
                                        <td>
                                    <tr>
                                        <?php } else {
                                        foreach ($arr as $prod) { ?>
                                    <tr class="table-default">
                                        <div class="alert alert-success" role="alert" id="addProd" style="display:none; z-index:50">
                                            <h5 class="alert-heading">Prodotto aggiunto con successo!</h5>
                                        </div>
                                        <div class="alert alert-danger" role="alert" id="prodNoAdd" style="display:none">
                                            <h5 class="alert-heading">Prodotto già in lista</h5>
                                        </div>
                                        <td scope="row">
                                        <div> <img class='super-logo' src="<?php echo $prod[0] ?>"></div>
                                        <div>                                        
                                        <p class="pt-3 mb-0" id="indirizzo"> <?php echo $prod[1] ?>, <?php echo $prod[2] ?> </p>
                                        </div>
                                    
                                        <td class="align-middle text-center"><?php echo $prod[4] ?></td>
                                        <td class="pt-4 text-center align-middle">
                                            <div class="form-group">
                                                <form>
                                                    <select class="form-control-xs" id="quantityId<?php echo $prod[5] ?>">
                                                        <?php for ($i = 1; $i <= 100; $i++) { ?>
                                                            <option><?php echo $i ?> </option>
                                                        <?php } ?>
                                                    </select>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="col-2 align-middle">
                                        <?php if ($prod[6]==0){?>
                                            <a class="btn pt-2 bt-1" role="button" onclick="addToList(<?php echo $prod[5] ?>)"> <img class="iconAddList" id="iconAddList<?php echo $prod[5] ?>" type="button" data-toggle="tooltip" data-placement="bottom" title="Aggiungi in lista" src="images/plus-circle.svg" height="25" alt="aggiungi alla lista"></a>
                                        <?php }else{?>
                                            <a class="btn pt-2 bt-1" role="button" onclick="addToList(<?php echo $prod[5] ?>)"> <img class="iconAddList" id="iconAddList<?php echo $prod[5] ?>" type="button" data-toggle="tooltip" data-placement="bottom" title="Prodotto già in lista" src="images/check-circle.svg" height="25" alt="prodotto in lista"></a>
                                        <?php }?> 
                                        </td>
                                    </tr>
                            <?php }
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            <?php } ?>

            </div>
        </div>
    </div>
    <?php include("templates/script_template.php"); ?>
    <script type="text/javascript" src="js/manageList.js"></script>

</body>

</html>