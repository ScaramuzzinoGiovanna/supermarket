<?php
session_start();
$insertMessage = "";
$array_list_super = [];
$supermarketPrice = [];


if (isset($_SESSION['id'])) {
    require "utility/db.php";
    $query = "SELECT list.id AS listId, product.name AS productName, product.imgpath AS productImgpath, productatmarket.price AS productPrice, supermarket.address AS supermarketAddress, supermarket.city AS supermarketCity, enterprise.name AS enterpriseName, list.quantity as listQuantity
            FROM ((((list JOIN productatmarket ON list.productatmarket=productatmarket.id) JOIN product ON product.id=productatmarket.product) JOIN supermarket ON supermarket.id=productatmarket.supermarket) JOIN enterprise ON supermarket.enterprise=enterprise.id)
            WHERE list.user=" . $_SESSION['id'] . "
            ORDER BY `supermarketCity` ASC, `enterpriseName` ASC, `supermarketAddress` ASC";
    if ($result = mysqli_query($con, $query)) {
        $numRows = mysqli_num_rows($result);
        if ($numRows  = 1) {
            while ($r = mysqli_fetch_assoc($result)) {
                $addr = $r['supermarketAddress'];
                $city = $r['supermarketCity'];
                $entName = $r['enterpriseName'];
                $array_list_super[$city][$entName][$addr][] = array("productName" => $r['productName'], 'productPrice' => $r['productPrice'], 'supermarketAddress' => $r['supermarketAddress'], 'supermarketCity' => $r['supermarketCity'], 'enterpriseName' => $r['enterpriseName'], 'productQuantity' => $r['listQuantity'], 'listId' => $r['listId'], 'productImgpath' => $r['productImgpath']);
            }
            foreach($array_list_super as $city => $sub1){
                foreach($sub1 as $entName => $sub2){
                    foreach($sub2 as $addr => $sub3 ){
                        $sum = 0;
                        foreach($sub3 as $item){
                            $sum += $item['productPrice']*$item['productQuantity'];
                            $supermarketPrice[$city][$entName][$addr] = $sum;
                        }
                    }
                }
            }
        } else {
            $listMessage = "Errore durante la lettura della lista. Riprovare";
        }
    }
}
