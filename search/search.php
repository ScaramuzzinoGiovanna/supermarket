<?php
session_start();
$createTable = False;
$arr = [];

if (isset($_POST['search'])) {
  // search in db
  require "2-search.php";
  // set results in array
  if ($numRows > 0) {
    $createTable = true;
    while ($r = mysqli_fetch_assoc($result)) {
      $link = str_replace(' ', '_', $r['productName']);
      $arr[] = array($r['productName'], $r['productImgpath'], $link);
      //$arr[]=$r['productName'];
    }
  } else {
    echo "Nessun Risultato";
  }
}
