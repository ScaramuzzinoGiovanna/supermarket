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
        <h1 class="text-center">Lista della spesa</h1>
        <ul class="list-group">
            <?php
            $lastAddress = "";
            $lastCity = "";
            $lastEnterprise = "";
            foreach($arr as $e){?>
                 <!-- header list (supermarket)-->
                 <?php if ($e[2] != $lastAddress or $e[3] != $lastCity or $e[4] != $lastEnterprise){ ?>
                 </li>
                     </fieldset>   
                    <li class="list-group-item list-group-item-secondary">
                        <div class="row">
                            <div class="col">
                                <h5> <?php echo $e[4]?></h5>
                                <br>
                               <p> <?php echo $e[2] ?> &nbsp <?php echo $e[3]?> </p> 
                            </div>
                            <div class="col-auto ">
                                <p class="text-xl-right">Totale: </p>
                                <p class="text-xl-right">_totale_</p>
                            </div>
                        </div>
                    </li>
                    <fieldset>
                        <li class="list-group-item">
                        <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck2" type="checkbox" value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <img class="prodImgList" src="img/product/Branzino.png">
                                    </div>
                                    <div class="col">
                                    <?php echo $e[0] ?>
                                        name_prod quantità_prod prezzo
                                    </div>
                                </div>
                            </div>
                 <!-- product list-->
                     <?php }else{ ?>
                     
                        <p> <?php  echo $e[0] ?> </p>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" id="customCheck2" type="checkbox" value="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <img class="prodImgList" src="img/product/Branzino.png">
                                    </div>
                                    <div class="col">
                                    <?php echo $e[0] ?>
                                        name_prod quantità_prod prezzo
                                    </div>
                                </div>
                            </div>
                                 
                <?php } 
                    $lastAddress = $e[2];
                    $lastCity = $e[3];
                    $lastEnterprise = $e[4]; } ?>

           

        </ul>
    </div>
    </div>
    <?php include("templates/script_template.php"); ?>


</body>

</html>