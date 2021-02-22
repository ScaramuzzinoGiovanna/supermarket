<?php
session_start();

include "db.php";

    $location = $_GET["loc"];
    $_SESSION['location'] = $location;
    if (isset($_SESSION['id'])){
    $query = "UPDATE user SET user.location='". $location . "' WHERE user.id=" .$_SESSION['id']. "";
    if ($result = mysqli_query($con, $query)) {
    }
}
?>