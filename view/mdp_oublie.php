<?php

include('../controllers/VerifMdp.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Connexion</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../css/owl.carousel.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/responsive.css">


    </head>

    <body class="body_login">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 form_login">
                    <div clas="col-md-12">
                        <h3 class="titre_login">Récupération du mot de passe</h3>
                    </div>
                    <div class="col-md-12">
                        <form method="POST">
                            <p>
                                <label>Entrez votre adresse mail : </label><input type="email" name="mail" />
                                <label>Entrez votre identifiant : </label><input type="text" name="identifiant" />
                            </p>
                            <br />
                            <input type="submit" name="validFormMdp" />
                        </form>
                        <br />
                        <form action="login.php">
                            <button type="submit">Retour</button>
                        </form>
                        <?php if(isset($message)) { echo $message; } ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>