<?php
session_start();

$deleteMessage = "";
if (isset($_SESSION['id'])) {
    if (isset($_GET["listId"])) {
        require "db.php";
        $listId = $_GET["listId"];
        echo $listId;
        $query = "DELETE FROM list WHERE list.id=".$listId;
        if ($result = mysqli_query($con, $query)) {
            $deleteMessage = "Cancellazione avvenuta con successo";
        } else {
            $deleteMessage = "Errore durante la cancellazione dalla lista. Riprovare";
        }
    }
}
echo $deleteMessage;