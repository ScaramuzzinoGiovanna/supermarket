<?php
session_start();
include "utility/db.php";

$productLink = test_input($_GET["product"]);
$product = str_replace('_', ' ', $productLink);
$arr = [];
$productError="";

$query = "SELECT product.name AS productName, product.imgpath AS productImgpath, supermarket.address AS supermarketAddress, supermarket.city AS supermarketCity, enterprise.name AS enterpriseName, enterprise.imgpath AS enterpriseImgpath 
    FROM (((product JOIN productatmarket ON product.id=productatmarket.product) JOIN supermarket ON supermarket.id=productatmarket.supermarket) JOIN enterprise ON enterprise.id=supermarket.enterprise) 
    WHERE product.name='".$product."'";

if($result = mysqli_query($con, $query)){
    $numRows = mysqli_num_rows($result);
    if ($numRows  = 1) {
        while ($r = mysqli_fetch_assoc($result)) {
            $prodName = $r['productName'];
            $prodImg = $r['productImgpath'];
            $arr[] = array( $r['enterpriseImgpath'],$r['supermarketAddress'], $r['supermarketCity'], $r['enterpriseName']);
        }
    }elseif ($numRows  != 1){
        $productError = "C'è stato un problema nel trovare i dati del prodotto";
    }
}
