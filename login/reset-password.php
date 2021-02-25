<?php
session_start();
include('utility/db.php');

$error = "";
$passwordErr = "";

if (
    isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"])
    && ($_GET["action"] == "reset") && !isset($_POST["action"])
) {
    $key = $_GET["key"];
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");
    $result = mysqli_query($con, "SELECT * FROM `password_reset_temp` WHERE `key`='" . $key . "' and `email`='" . $email . "';");
    $row = mysqli_num_rows($result);
    if ($row == "") {
        $error = '<h2>Link non utilizzabile</h2>
        <p>Il link è errato. Potresti aver copiato in modo sbagliato il link dalla mail oppure aver già usato questo link per cambiare password.</p>
        <p><a href="http://spesaconveniente.altervista.org/password-forgotten_view.php">
        Clicca qui</a> per cambiare password.</p>';
    } else {
        $row = mysqli_fetch_assoc($result);
        $expDate = $row['expDate'];
        if ($expDate >= $curDate) {
            $resetPassword = "ok";
        } else {
            $error = '<h2>Link Scaduto</h2>
            <p>Il link è scaduto. Stai cercando di usare un link scaduto che ha validità solo per 24 ore (1 giorno dalla richiesta) </p>
            <p><a href="http://spesaconveniente.altervista.org/password-forgotten_view.php">
            Clicca qui</a> per cambiare password.</p>';
        }
    }
    //if ($error != "") {
        //echo "<div class='error'>" . $error . "</div><br />";
    //}
} // isset email key validate end


if (
    isset($_POST["email"]) && isset($_POST["action"]) &&
    ($_POST["action"] == "update")
) {
   
    $password = test_input($_POST["password"]);
    if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $password)) {
        $passwordErr = "Sono ammesse solo password di almeno 8 e massimo 20 caratteri con lettere e numeri";
    }
    $confirm_password = test_input($_POST["confirm_password"]);
    $email = test_input($_POST["email"]);
    $curDate = date("Y-m-d H:i:s");
    if ($password != $confirm_password) {
        $passwordErr= "Le password non coincidono";
    }
    if ($passwordErr == "") {
        $options = array("cost"=>4);
        $hashed_password = password_hash($password,PASSWORD_BCRYPT,$options);
        mysqli_query($con, "UPDATE `user` SET `password`='" . $hashed_password ."' WHERE `email`='" . $email . "';");
        mysqli_query($con, "DELETE FROM `password_reset_temp` WHERE `email`='" . $email . "';");
        $result = mysqli_query($con,"SELECT * FROM user WHERE email='" . $email . "' and password = '". $hashed_password."'");
        $row  = mysqli_fetch_array($result);
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["surname"] = $row['surname'];
        $_SESSION["email"] = $row['email'];
        header("Location:index.php");
        //echo '<div class="error"><p>La tua password è stata modificata con successo!.</p>
        //<p><a href="http://localhost/prove_progetto/login/login.php">
        //Premi qui</a> per accedere.</p></div><br />';
    }
}
?>