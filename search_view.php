<?php
include("templates/head_template.php");
include("search/search.php")
?>

<meta name="description" content="Supermarket products" />

<title>Cerca</title>
</head>

<body>
    <?php include("templates/nav_template.php"); ?>
    <div class="col-md-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active"> Cerca</li>
        </ol>
    </div>
    <div class="text-center">
        <h5>Confronta i migliori prezzi per _parola inserita nel form_</h5>
    </div>
    <div class="container containerPaddingMargin">
        <div class="card">
            <div class="jumbotron-fluid">
                <table class="table tableSearchProducts">
                    <tbody>
                        <?php foreach ($arr as $prod) { ?>
                            <tr>
                                <th scope="row">
                                    <a href="product_view.php?product=<?php echo $prod[2] ?>"> <?php echo $prod[0] ?></a>
                                </th>
                                <td> <img src="<?php echo $prod[1] ?>">
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