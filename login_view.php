<?php include("login/login.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="" />
    <meta name="description" content="accesso utente" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" type="text/css" href="css/minty/bootstrap.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">
    <title>Accedi</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col text-center">
                <a class="navbar-brand btn btn-outline-primary logoName mb-5" href="index.php"> SpesaConveninete</a>
            </div>
        </div>
        <div class="d-flex justify-content-center h-100">
            <div class="card  border-primary mb-3 card-dim">
                <div class="card-header title-card">ACCEDI</div>
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
                        <div class="form-group">
                            <label for="exampleInputEmail1">Indirizzo email</label>
                            <div class="input-group mb-2">
                                <div class="input-group-append ">
                                    <span class="input-group-text borderColorPrimary rounded-left"><img src="images/envelope.svg"></img></span>
                                </div>
                                <input type="email" name="email" class="form-control accesso" id="exampleInputEmail1" required="TRUE" aria-describedby="emailHelp" placeholder="email@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <!--                            <a href="#" >Password dimenticata? </a>-->
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text borderColorPrimary rounded-left"><img src="images/key.svg"></img></span>
                                </div>
                                <?php if ($passwordErr == "") { ?>
                                    <input type="password" name="password" required="TRUE" class="form-control accesso " id="exampleInputPassword1" placeholder="">
                                    <!-- <span class="error"> <?php echo $passwordErr; ?></span> -->
                                <?php
                                } else { ?>

                                    <input type="password" name="password" required="TRUE" class="form-control is-invalid" id="exampleInputPassword1" placeholder="">

                                <?php
                                }
                                ?>
                            </div>
                            <!-- <?php// if ($passwordErr != "") { ?>
                                <small id="passwordHelp" class="text-danger">Password errata: deve essere di 8-20 caratteri con lettere e numeri</small>
                            <?//php
                            //}
                            //?>-->
                        </div>

                        <!-- <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" checked="">
                                <label class="custom-control-label" for="customCheck1">Resta connesso</label>
                            </div></div> -->

                        <div class="form-group">
                            <input type="submit" name="submit" value="Accedi" class="btn btn-primary btn-sm login_btn"></input>
                        </div>
                    </form>
                </div>

                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Non hai ancora un account?&nbsp
                        <a href="signin_view.php"> Registrati</a>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="password-forgotten_view.php">Password dimenticata?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js" charset="UTF-8"></script>

</body>

</html>