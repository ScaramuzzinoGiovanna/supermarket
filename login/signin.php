<?php
session_start();
$message = "";
$mailErr = $email = "";
$passwordErr = $password = "";
$nameErr = $name = "";
$signErr = "";
$validate = true;
$result = false;
$signed = false;

    if (count($_POST) > 0) {
        include "utility/db.php";

        if (empty($_POST["email"])) {
            $mailErr = "É obbligatorio inserire un'email";
            $validate = false;
        } else {
            $email = test_input($_POST["email"]);
            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            if (!$email) {
                $mailErr = "Indirizzo mail non valido";
                $validate = false;
            }
        }

        if (empty($_POST["password"])) {
            $passwordErr = "É obbligatorio inserire una password";
            $validate = false;
        } else {
            $password = test_input($_POST["password"]);
            if (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $password)) {
                $passwordErr = "Sono ammesse solo password di almeno 8 e massimo 20 caratteri con lettere e numeri";
                $validate = false;
            }
            $confirm_password = test_input($_POST["confirm_password"]);
            if ($confirm_password!=$password) {
                $passwordErr = "La password non coincidono";
                $validate = false;
            }
            $options = array("cost"=>4);
            $hashed_password = password_hash($password,PASSWORD_BCRYPT,$options);        
        }

        if (empty($_POST["name"])) {
            $nameErr = "É obbligatorio inserire nome e cognome";
            $validate = false;
        } else {
            $name = test_input($_POST["name"]);
        }

        if (empty($_POST["surname"])) {
            $nameErr = "É obbligatorio inserire nome e cognome";
            $validate = false;
        } else {
            $surname = test_input($_POST["surname"]);
        }

        if (empty($_POST["city"])) {
            $cityErr = "É obbligatorio inserire una città. É possibile modificarla in qualsiasi momento nella pagina del proprio profilo o attivando la geolocalizzazione";
            $validate = false;
        } else {
            $city = test_input($_POST["city"]);
        }

        if ($validate==true){
            $result = mysqli_query($con,"SELECT * FROM user WHERE email='" . $email ."'");
            $row = mysqli_num_rows($result);
            if ($row==""){
                $result = mysqli_query($con, "INSERT INTO user(email, password, name, surname, location) VALUES('" . $email . "','" . $hashed_password ."','" . $name ."','" . $surname ."','" . $city ."')");
                $signed = true;
            }
            else{
                $signed = false;
                $signErr = "Esiste già un utente con lo stesso indirizzo e-mail";                
            }
        }
        
        if($signed){
            $message= "Registrazione andata a buon fine";
            $result = mysqli_query($con,"SELECT * FROM user WHERE email='" . $email . "' and password = '". $hashed_password."'");
            $row  = mysqli_fetch_array($result);
            $_SESSION["id"] = $row['id'];
            $_SESSION["name"] = $row['name'];
            $_SESSION["surname"] = $row['surname'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["location"] = $row['location'];
            header("Location:index.php");
        }else{
            if($signErr!=""){
                $message= "Registrazione non andata a buon fine<br>" . $signErr;
            }
            else if($passwordErr!=""){
                $message= "Registrazione non andata a buon fine<br>" . $passwordErr;
            }
            else
            $message= "Registrazione non andata a buon fine";
        }
        
    }



?>
