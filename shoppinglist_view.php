<?php
include("templates/head_template.php");
include("utility/list.php");
?>

<meta name="description" content="Supermarket products" />

<title>Lista della spesa</title>
</head>

<body>
    <?php include("templates/nav_template.php"); ?>

    <div class="container containerPaddingMargin">
        <h1 class="text-center pb-3">Lista della spesa</h1>
        <?php if (empty($array_list_super)){?>
            <p class="text-center"> Non hai ancora inserito alcun elemento in lista </p>
            <p class="text-center"> Aggiungi i prodotti più convenienti tramite il simbolo <img src="images/plus-circle.svg"> </p>
        <?php }else{ ?>
            <div class="d-flex justify-content-end">
            <a class="btn btn px-2 pb-4 " role="button" onclick=removeFromList()> 
                <img class="trashSVG" type="button" data-toggle="tooltip" data-placement="left" title="Elimina prodotti selezionati dalla lista" src="images/trash.svg" height="30" alt="Elimina dalla lista">
            </a>
            </div> 
            <ul class="list-group">
       
           <?php foreach($array_list_super as $city => $sub1){
                    foreach($sub1 as $entName => $sub2){
                        foreach($sub2 as $addr => $sub3 ){   ?>
                        <li class="list-group-item list-group-item-secondary">
                            <div class="row">
                                <div class="col">
                                    <h5> <?php echo $entName ?></h5>
                                    <br>
                                    <p> <?php echo $addr ?> &nbsp <?php echo $city ?> </p>
                                </div>
                                <div class="col-auto ">
                                    <p class="text-xl-right">Totale spesa: </p>
                                    <p class="text-xl-right">€ <?php echo $supermarketPrice[$city][$entName][$addr] ?></p>
                                </div>
                            </div>
                        </li>
                    <?php foreach($sub3 as $item){ ?>
                        <fieldset>
                            <li class="list-group-item">
                                <div class="form-group">
                                    <div class="row inline-block">
                                        <div class="col-xs-1 col-sm-1 col-md-1 col-xl-1">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input chkbox" id="<?php echo $item['listId']?>" type="checkbox" value="<?php echo $item['listId'] ?>">
                                                <label class="custom-control-label" for="<?php echo $item['listId'] ?>"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-1 col-md-1 col-xl-2">
                                            <img class="prodImgList" src=<?php echo $item['productImgpath'] ?>>
                                        </div>
                                        <div class=" col-xs-3 col-sm-3 col-md-2 col-xl-2 ">
                                        <a href="product_view.php?product=<?php echo str_replace(' ', '_', $item['productName'])?>"><p class="font-weight-bold"> <?php echo $item['productName'] ?> </P></a>
                                        </div>
                                        <div class="col-sm-1 offset-sm-2">
                                        <span class="badge badge-primary badge-pill">Q.tà: <?php echo $item['productQuantity'] ?></span>
                                           
                                        </div>
                                        <div class="col-sm-1 col-md-2 col-xl-2 offset-sm-2 text-xl-right">
                                            <p> € <?php echo $item['productPrice'] ?>/pz</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </fieldset>
                    <?php } ?>
                <?php }?>
            <?php }?>
            <?php }?>
        </ul>
    <?php } ?>   

    </div>

    <?php include("templates/script_template.php"); ?>
    <script type="text/javascript" src="js/manageList.js"></script>


</body>

</html>