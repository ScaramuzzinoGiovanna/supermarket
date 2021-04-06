<?php
session_start();

include "db.php";

    $location = $_GET["loc"];
    $_SESSION['location'] = $location;

?>