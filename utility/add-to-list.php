<?php
$insertMessage = "";
$addProd="";
session_start();
if (isset($_SESSION['id'])) {
    if (isset($_GET["productMarketId"]) && isset($_GET["quantity"])) {
        require "db.php";
        $productAtMarket = test_input($_GET["productMarketId"]);
        $quantity = test_input($_GET["quantity"]);
        $query = "INSERT INTO list (user, productAtMarket, quantity) VALUES (" . $_SESSION['id'] . ", " . $productAtMarket . ", " . $quantity . ")";
        if ($result = mysqli_query($con, $query)) {
            $insertMessage = "Inserimento avvenuto con successo";
            $addProd = "0";
        } else {
            $insertMessage = "Errore durante l'inserimento nella lista. Riprovare";
            $addProd = "1";
        }
    }
}
else{
    $addProd="2";
}
echo $addProd;
?>
