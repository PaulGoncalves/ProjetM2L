<?php

include('../controllers/connexion.php');


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
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">


    </head>

    <body class="body_login">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 form_login">
                    <div clas="col-md-12">
                        <h3 class="titre_login">Connexion</h3>
                    </div>
                    <div class="col-md-12">
                        <form method="POST" name="login">
                            <label class="text_login">Identifiant : </label><input type="text" placeholder="Entrez votre identifiant" name="identifiant"/>
                            <label class="text_login">Mot de passe : </label><input type="password" placeholder="Entrez votre mot de passe" name="mdp"/>
                            <!--<label class="text2_login col-md-10"><input type="checkbox" name="retenir_mdp" class="col-md-2 checkbox_login"/>Se souvenir de moi</label>-->
                            <input type="submit" value="Connexion" class="bouton_login" name="formconnexion"/>
                        </form>
                        <br />
                        <div align="center">
                            <a class="mdp_oublie" href="mdp_oublie.php">Mot de passe oublié ?</a>
                        </div>
                        <br />
                        <br />
                        <?php if(isset($message)) { echo $message; } ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>