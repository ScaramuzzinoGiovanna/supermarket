<?php
session_start();
$arr = [];

$charSearch = $_POST['search'];
$noResult = false;
if (isset($_POST['search'])) {
  // search in db
  require "2-search.php";
  // set results in array
  if ($numRows > 0) {
    while ($r = mysqli_fetch_assoc($result)) {
      $link = str_replace(' ', '_', $r['productName']);
      $arr[] = array($r['productName'], $r['productImgpath'], $link);
    }
  } else {
    $noResult = true;
  }
}
