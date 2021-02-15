<?php
session_start();
include("templates/head_template.php");
?>

<meta name="description" content="Supermarket products" />

<title>Lista della spesa</title>
</head>

<body>
    <?php include("templates/nav_template.php"); ?>
    <div class="container containerPaddingMargin">
        <h1 class="text-center">Lista della spesa</h1>
        <ul class="list-group">
            <li class="list-group-item list-group-item-secondary">
                <div class="row">
                    <div class="col">
                        SupermarketName
                    </div>
                    <div class="col-auto ">
                        <p class="text-xl-right">Totale: </p>
                        <p class="text-xl-right">_totale_</p>
                    </div>
                </div>
            </li>
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
                            name_prod quantità_prod prezzo
                        </div>
                    </div>
                </div>
            </li>

        </ul>
        <!-- <div class="card">
            <div class="jumbotron-fluid">
                <div class="table">
                    <table class="table ">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <fieldset class="form-group">
                                        <div class="form-check disabled">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" disabled="">

                                            </label>
                                        </div>
                                    </fieldset>
                                </th>
                                <td> <img class="prodImgList" src="img/product/Branzino.png">
                                <td>name_prod</td>
                                <td>quantità prod
                                </td>
                                <td>prezzo
                                </td>
                                <td><img src="images/trash.svg">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>-->
    </div>
    </div>
    <?php include("templates/script_template.php"); ?>


</body>

</html>