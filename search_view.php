<?php
include("templates/head_template.php");
include("search/search.php")
?>

<meta name="description" content="Supermarket products" />

<title>Cerca</title>
</head>

<body>
    <?php include("templates/nav_template.php"); ?>    
    <div class="container containerPaddingMargin">
        <div class="text-center mb-4">
            <h5>Confronta i migliori prezzi per <h5 class= pink-text> "<?php echo $charSearch ?>" </h5> </h5>
        </div>
        <div class="card">
            <div class="jumbotron-fluid">
                <table class="table tableSearchProducts mb-0">
                    <tbody>
                        <!--no product searched-->
                    <?php if ($noResult==true) { ?>
                        <tr>
                            <th class="text-center"> Non è stato trovato alcun risultato</th>
                    </tr>
                    <?php } else {?> 
                          <!--if product searched-->
                        <?php foreach ($arr as $prod) { ?>
                            <tr>
                                <th>
                                    <a href="product_view.php?product=<?php echo $prod[2] ?>"> <?php echo $prod[0] ?></a>
                                </th>
                                <td> <img class="prodImg" src="<?php echo $prod[1] ?>">
                                </td>
                            </tr>
                        <?php } ?>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <?php include("templates/script_template.php"); ?>
</body>

</html>