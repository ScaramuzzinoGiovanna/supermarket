<?php
session_start();

include "db.php";

if (isset($_SESSION['id'])) {
    $location = $_GET["loc"];
    $query = "UPDATE user SET user.location='". $location . "' WHERE user.id=" .$_SESSION['id']. "";
    if ($result = mysqli_query($con, $query)) {
        $_SESSION['location'] = $location;
    }
}
?>