<?php
include("login/reset-password.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" type="text/css" href="css/minty/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Password dimenticata</title>
</head>

<body>
    <?php if ($error != "") { ?>
        <strong><?php echo $error; ?></strong>
    <?php
    } else {
    ?>
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <a class="navbar-brand btn btn-outline-primary logoName mb-5" href="index.php"> SpesaConveninete</a>
                </div>
            </div>
            <div class="d-flex justify-content-center h-100">
                <div class="card border-primary mb-3 card-dim">
                    <div class="card-header title-card">MODIFICA PASSWORD</div>
                    <div class="card-body">

                        <?php if ($passwordErr != "") { ?>
                            <div class="alert alert-dismissible alert-danger">
                                <button type="button" class="close" data-dismiss="alert">&times; </button>
                                <strong><?php echo $passwordErr; ?></strong>
                            </div>
                        <?php
                        }
                        ?>
                        <h6>Ti richiederemo questa password ogni volta che effettuerai l'accesso.</h6>
                        <br>
                        <form method="post" action="" name="update">
                            <input type="hidden" name="action" value="update" />
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <span class="infoIcon"> <img class="pink-tooltip" data-toggle="tooltip-password" src="images/info.svg" alt="info password"> </span>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text iconIll"><img src="images/key.svg"></img></span>
                                    </div>
                                    <input type="password" required="" name="password" class="form-control accesso" id="exampleInputPassword1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword2">Conferma password</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text iconIll"><img src="images/key.svg"></img></span>
                                    </div>
                                    <input type="password" required="" name="confirm_password" class="form-control accesso" id="exampleInputPassword2">
                                </div>
                            </div>
                            <input type="hidden" name="email" value="<?php echo $email; ?>" />
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-primary btn-sm login_btn" value="Conferma modifica e accedi"></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php
    }
    ?>
    <script type="text/javascript" src="js/jquery.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/tooltip.js" harset="UTF-8"></script>


</body>

</html>