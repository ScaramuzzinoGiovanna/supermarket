<?php
session_start();
$createTable = False;
$arr = [];

if (isset($_POST['search'])) {
    // (B1) SEARCH FOR USERS
    require "2-search.php";
    // (B2) DISPLAY RESULTS
    if ($numRows > 0) {
     $createTable = true;
        /*echo "<table>
                <thread>
                <tr>
                <th>Nome prodotto</th>
                <th>Immagine</th>
                <th>Supermercato</th>
                <th>Indirizzo</th>
                <th>Città</th>
                <th>Azienda</th>
                </tr>
                </thread>
                <tbody>";*/
        while ($r = mysqli_fetch_assoc($result)) {
          $arr[]= array($r['productName'],$r['productImgpath']);    
          //$arr[]=$r['productName'];
      } 
    } else { echo "Nessun Risultato"; }
  }
?>