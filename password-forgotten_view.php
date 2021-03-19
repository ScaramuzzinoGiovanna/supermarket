<?php include("login/password-forgotten.php"); ?>

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
    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <a class="navbar-brand btn btn-outline-primary logoName mb-5" href="index.php"> SpesaConveniente</a>
            </div>
        </div>
        <div class="d-flex justify-content-center h-100">
            <div class="card border-primary mb-3 card-dim">
                <div class="card-header title-card">RECUPERO PASSWORD</div>
                <div class="card-body">
                    <?php if ($error != "") { ?>
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times; </button>
                            <strong><?php echo $error; ?></strong>
                        </div>
                    <?php
                    }
                    ?>
                    <?php if ($mailSend != "") { ?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times; </button>
                            <strong><?php echo $mailSend; ?></strong>
                        </div>
                    <?php
                    }
                    ?>

                    <form method="post" action="" name="reset">
                        <h6>Inserisci l'indirizzo e-mail associato al tuo account</h6>
                        <h6 style="font-weight:bold"> SpesaConveniente.</h6>
                        <br>
                        <div class=" form-group">
                            <label for="exampleInputEmail1">Indirizzo email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text borderColorPrimary rounded-left"><img src="images/envelope.svg"></img></span>
                                </div>
                                <input type="email" required="" class="form-control accesso" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="username@email.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary btn-sm login_btn"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js" charset="UTF-8"></script>

</body>

</html>