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
            <li class="breadcrumb-item active"></li>
        </ol>
    </div>
    <div class="container">
        <div class="card">
            <div class="jumbotron-fluid">
                <div class="wrapper row">
                    <table class="table table-hover">
                        <tbody>
                            <?php foreach($arr as $prod){?>
                                <tr class="table-default">
                                    <th scope="row"> <?php echo $prod[0]?></th>
                                        <td> <img src="<?php echo $prod[1]?>"> </td>
                                    </tr>
                            <?php } ?>
                        
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include("templates/script_template.php"); ?>
</body>

</html>