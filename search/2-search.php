<?php
    include "utility/db.php";
    $numRows = 0;
    $searchField = test_input($_POST['search']);
    $query = "SELECT product.name AS productName, product.imgpath AS productImgpath FROM product WHERE product.name LIKE '%".$searchField."%' LIMIT 10";

    // (C) SEARCH
    if($result = mysqli_query($con, $query)){
        $numRows = mysqli_num_rows($result);
    }
    
