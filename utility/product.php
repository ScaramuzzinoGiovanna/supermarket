<?php
session_start();
include "utility/db.php";

$arr = [];
$productError = $productNotFoundInYourCity = $prodName = $prodImg = "";
$productLink = test_input($_GET["product"]);
$product = str_replace('_', ' ', $productLink);

$query1 = "SELECT product.name AS productName, product.imgpath AS productImgpath
    FROM product
    WHERE product.name='" . $product . "'";

if ($result1 = mysqli_query($con, $query1)) {
    $numRows1 = mysqli_num_rows($result1);
    if ($numRows1  == 1) {
        while ($r = mysqli_fetch_assoc($result1)) {
            $prodName = $r['productName'];
            $prodImg = $r['productImgpath'];
        }
    } else {
        $productError = "C'è stato un problema nel trovare i dati del prodotto";
    }
}


if (isset($_SESSION['location'])) {

    $location = $_SESSION['location'];


    $query = "SELECT product.name AS productName, product.imgpath AS productImgpath, productatmarket.id AS productatmarketId, productatmarket.price AS productatmarketPrice, supermarket.address AS supermarketAddress, supermarket.city AS supermarketCity, enterprise.name AS enterpriseName, enterprise.imgpath AS enterpriseImgpath 
    FROM (((product JOIN productatmarket ON product.id=productatmarket.product) JOIN supermarket ON supermarket.id=productatmarket.supermarket) JOIN enterprise ON enterprise.id=supermarket.enterprise) 
    WHERE product.name='" . $product . "' AND supermarket.city='" . $location . "' 
    ORDER BY `productatmarketPrice` ASC";



    if ($result = mysqli_query($con, $query)) {
        $numRows = mysqli_num_rows($result);
        if ($numRows  > 1) {
            while ($r = mysqli_fetch_assoc($result)) {
                $arr[] = array($r['enterpriseImgpath'], $r['supermarketAddress'], $r['supermarketCity'], $r['enterpriseName'], $r['productatmarketPrice'], $r['productatmarketId']);
            }
        } else {
            $productNotFoundInYourCity = "Il prodotto non è presente nella tua città";
        }
    }
}