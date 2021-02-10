<?php
session_start();
$message = "";
$mailErr = $email = "";
$passwordErr = $password = "";
$validate = true;
$row = "";

if (count($_POST) > 0) {
    include "utility/db.php";


    if (empty($_POST["email"])) {
        $mailErr = "É obbligatorio inserire una email";
        $validate = false;
    } else {
        $email = test_input($_POST["email"]);
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
    }

    if ($validate == true) {
        $result = mysqli_query($con, "SELECT * FROM user WHERE email='" . $email . "'");
        $numRows = mysqli_num_rows($result);

        if ($numRows  == 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['password'])) {
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['name'];
                $_SESSION["surname"] = $row['surname'];
                $_SESSION["email"] = $row['email'];
                $_SESSION["location"] = $row['location'];
                header("Location:index.php"); 
            } else {
                $message = "E-mail o Password non validi!";
            }
        } else {
            $message = "Non sei registrato";
        }
    }
    else{
        $message = "Password non valida!<br>" . $passwordErr;
    }
}

?>

<!-- <html>

<head>
    <title>Accedi</title>
</head>

<body>
    <form name="frmUser" method="post" action="" align="center">
        <div class="message"><?php if ($message != "") {
                                    echo $message;
                                } ?></div>
        <h3 align="center">Accedi</h3>
        email:
        <input type="text" name="email">
        <br>
        <span class="error"> <?php echo $mailErr; ?></span>
        <br>
        Password:
        <input type="password" name="password">
        <br>
        <span class="error"> <?php echo $passwordErr; ?></span>
        <br>
        <input type="submit" name="submit" value="Accedi">
        <a href="password-forgotten.php" tite="reset_password"><input type="button" value="Reimposta Password"></a>
    </form>
</body>

</html> -->