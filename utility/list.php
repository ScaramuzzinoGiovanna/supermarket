<?php
$insertMessage = "";
session_start();
$arr = [];
$list = "";


if (isset($_SESSION['id'])) {
    require "utility/db.php";
    //require "db.php";
    $query = "SELECT list.id AS listId, product.name AS productName, product.imgpath AS productImgpath, productatMarket.price AS productPrice, supermarket.address AS supermarketAddress, supermarket.city AS supermarketCity, enterprise.name AS enterpriseName, list.quantity as listQuantity
            FROM ((((list JOIN productatMarket ON list.productAtMarket=productatMarket.id) JOIN product ON product.id=productatMarket.product) JOIN supermarket ON supermarket.id=productatMarket.supermarket) JOIN enterprise ON supermarket.enterprise=enterprise.id)
            WHERE list.user=" . $_SESSION['id']. "
            ORDER BY `enterpriseName` ASC, `supermarketCity` ASC, `supermarketAddress` ASC";
    if ($result = mysqli_query($con, $query)) {
        $numRows = mysqli_num_rows($result);
        if ($numRows  = 1) {
            while ($r = mysqli_fetch_assoc($result)) {
                $arr[] = array($r['productName'], $r['productImgpath'], $r['productPrice'], $r['supermarketAddress'], $r['supermarketCity'], $r['enterpriseName'], $r['listQuantity'], $r['listId']);
            }

        $lastAddress = "";
        $lastCity = "";
        $lastEnterprise = "";
        foreach($arr as $e){
            if ($e[2] == $lastAddress && $e[3] == $lastCity && $e[4] == $lastEnterprise){
                 $list .= "mettere codice html per continuare con una nuova riga una tabella già iniziata";
            }elseif($lastAddress == "" && $lastCity == "" && $lastEnterprise == ""){
                $list .= "mettere codice html per iniziare la prima tabella";
            }else{
                $list .= "mettere codice html per chiudere la tabella precedente, spazio e aprire una tabella nuova per un altro supermercato";
            }
            $lastAddress = $e[2];
            $lastCity = $e[3];
            $lastEnterprise = $e[4];
        }
        $list .= "chiudere ultima tabella";
        }
    } else {
        $listMessage = "Errore durante la lettura nella lista. Riprovare";
    }
}
// echo json_encode($arr);
