<?php include("login/signin.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="cibo, supermercato, convenienza" />
    <meta name="description" content="registrazione utente" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" type="text/css" href="css/minty/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Registrati</title>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card border-primary mb-3 card-dim">
                <div class="card-header title-card">REGISTRATI</div>
                <div class="card-body">
                    <?php if ($message != "") { ?>
                        <div class="alert alert-dismissible alert-danger">
                            <button type="button" class="close" data-dismiss="alert">&times; </button>
                            <strong><?php echo $message; ?></strong>
                        </div>
                    <?php
                    }
                    ?>
                    <form name="frmUser" method="post" action="">
                        <div class="form-row">
                            <div class="form-group col col-margin-0">
                                <label for="nome">Nome</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text borderColorPrimary 
                                        
                                        rounded-left"><img src="images/person.svg"></img></span>
                                     </div>
                                    <input type="text" name="name" required="" class="form-control accesso" id="nome" placeholder="">
                                </div>
                            </div>
                            <div class="form-group col col-margin-0">
                                <label for="cognome">Cognome</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text borderColorPrimary rounded-left"><img src="images/person.svg"></img></span>
                                     </div>
                                    <input type="text" name="surname" required="" class="form-control accesso" id="cognome" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="città">Città</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text borderColorPrimary rounded-left"><img src="images/geo-alt.svg"></img></span>
                                </div>
                                <input type="text" name="city" required="" class="form-control accesso" id="città">
                                <!--                                   placeholder="Inserisci cognome">-->
                            </div>
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputEmail1">Indirizzo e-mail</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text borderColorPrimary rounded-left"><img src="images/envelope.svg"></img></span>
                                </div>
                                <input type="email" required="" name="email" class="form-control accesso" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <span class="infoIcon"> <img class="pink-tooltip" data-toggle="tooltip-password" src="images/info.svg" alt="info password"> </span>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text borderColorPrimary rounded-left"><img src="images/key.svg"></img></span>
                                </div>
                                <input type="password" required="" name="password" class="form-control accesso" id="exampleInputPassword1">
                            </div>
                            <!--                        <small id="passwordHelp" class="form-text text-muted">Le password devono essere composte da-->
                            <!--                            almeno 8 caratteri e numeri , e massimo 20.</small>-->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Conferma password</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text borderColorPrimary rounded-left"><img src="images/key.svg"></img></span>
                                </div>
                                <input type="password" required="" name="confirm_password" class="form-control accesso" id="exampleInputPassword2">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm login_btn" value="Registrati"></input>
                            <!--                        <input type="submit" value="Login" class="btn float-right login_btn">-->
                        </div>

                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Hai già un account?&nbsp
                        <a href="login_view.php"> Accedi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/tooltip.js" harset="UTF-8"></script>

</body>

</html>