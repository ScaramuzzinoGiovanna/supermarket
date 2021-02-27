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


    



    if (isset($_SESSION['id'])) {
        $queryList = "SELECT list.id AS listId, product.name AS productName, product.imgpath AS productImgpath, productatmarket.price AS productPrice, supermarket.address AS supermarketAddress, supermarket.city AS supermarketCity, enterprise.name AS enterpriseName, list.quantity as listQuantity
            FROM ((((list JOIN productatmarket ON list.productatmarket=productatmarket.id) JOIN product ON product.id=productatmarket.product) JOIN supermarket ON supermarket.id=productatmarket.supermarket) JOIN enterprise ON supermarket.enterprise=enterprise.id)
            WHERE list.user=" . $_SESSION['id'] . "
            ORDER BY `supermarketCity` ASC, `enterpriseName` ASC, `supermarketAddress` ASC";
        if ($resultList = mysqli_query($con, $queryList)) {
            $numRowsList = mysqli_num_rows($resultList);
            if ($numRowsList  > 0) {
                while ($r = mysqli_fetch_assoc($resultList)) {
                    $addr = $r['supermarketAddress'];
                    $city = $r['supermarketCity'];
                    $entName = $r['enterpriseName'];
                    $array_list_super[$city][$entName][$addr][] = array("productName" => $r['productName'], 'productPrice' => $r['productPrice'], 'supermarketAddress' => $r['supermarketAddress'], 'supermarketCity' => $r['supermarketCity'], 'enterpriseName' => $r['enterpriseName'], 'productQuantity' => $r['listQuantity'], 'listId' => $r['listId'], 'productImgpath' => $r['productImgpath']);
                }
            }
        }
    }

    $query = "SELECT product.name AS productName, product.imgpath AS productImgpath, productatmarket.id AS productatmarketId, productatmarket.price AS productatmarketPrice, supermarket.address AS supermarketAddress, supermarket.city AS supermarketCity, enterprise.name AS enterpriseName, enterprise.imgpath AS enterpriseImgpath 
    FROM (((product JOIN productatmarket ON product.id=productatmarket.product) JOIN supermarket ON supermarket.id=productatmarket.supermarket) JOIN enterprise ON enterprise.id=supermarket.enterprise) 
    WHERE product.name='" . $product . "' AND supermarket.city='" . $location . "' 
    ORDER BY `productatmarketPrice` ASC";


    if ($result = mysqli_query($con, $query)) {
        $numRows = mysqli_num_rows($result);
        if ($numRows  > 1) {
            while ($r = mysqli_fetch_assoc($result)) {
                if (isset($_SESSION['id'])) {
                    if (isset($array_list_super[$r['supermarketCity']][$r['enterpriseName']][$r['supermarketAddress']])) {
                        $found = false;
                        foreach($array_list_super[$r['supermarketCity']][$r['enterpriseName']][$r['supermarketAddress']] as $item){
                        if ($item['productName'] == $r['productName']){
                            $found=true;   
                        }
                    }
                    if ($found){
                        $arr[] = array($r['enterpriseImgpath'], $r['supermarketAddress'], $r['supermarketCity'], $r['enterpriseName'], $r['productatmarketPrice'], $r['productatmarketId'], 1);
                    }else{
                        $arr[] = array($r['enterpriseImgpath'], $r['supermarketAddress'], $r['supermarketCity'], $r['enterpriseName'], $r['productatmarketPrice'], $r['productatmarketId'], 0);
                    }
                    } else {
                        $arr[] = array($r['enterpriseImgpath'], $r['supermarketAddress'], $r['supermarketCity'], $r['enterpriseName'], $r['productatmarketPrice'], $r['productatmarketId'], 0);
                    }
                } else {
                    $arr[] = array($r['enterpriseImgpath'], $r['supermarketAddress'], $r['supermarketCity'], $r['enterpriseName'], $r['productatmarketPrice'], $r['productatmarketId'], 0);
                }
            }
        } else {
            $productNotFoundInYourCity = "Il prodotto non è presente nella tua città";
        }
    }
}
echo json_encode($arr);
