<?php

include "../utility/db.php";

//get the search parameter from the form
$searchField = test_input($_GET["search"]);
$arr = [];

//search in the db if search length >0
if (strlen($searchField)>0) {
  $query = "SELECT product.name AS productName FROM product WHERE product.name LIKE '%".$searchField."%' LIMIT 5";
  if($result = mysqli_query($con, $query)){
    $numRows = mysqli_num_rows($result);
    if ($numRows  > 0) {
      while ($r = mysqli_fetch_assoc($result)) {
        $arr[]= $r['productName'];

      }
    }
  }
}


//output the response
echo json_encode($arr);

?>