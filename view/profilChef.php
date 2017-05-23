<?php
include('../model/connexionBdd.php');
session_start();


if(isset($_GET['id_s']) AND $_GET['id_s'] > 0)
{
    $getid = intval($_GET['id_s']);
    $requser = $bdd->prepare('SELECT * FROM salarie WHERE id_s = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    if($_GET['id_s'] == isset($_SESSION['id_s'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profil de <?php echo $_SESSION['identifiant']; ?></title>

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

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
    </head>
    <body>

        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-xs-6">
                        <div class="user-menu">
                            <ul>
                                <li><a href="../Profil-Chef/<?php echo $_SESSION['id_s']; ?>"><i class="fa fa-user"></i> Mon Compte</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4 col-xs-6">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                <li><a href="../controllers/deconnexion.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End header area -->

        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <h1><a href="../Accueil-Chef/<?php echo $_SESSION['id_s']; ?>">Form<span>ation</span></a></h1>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="shopping-item">
                            <a>Crédits : <span class="cart-amunt"> <?php echo $userinfo['nbs_jour']; ?></span><i class="fa fa-credit-card" aria-hidden="true"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- End site branding area -->

        <div class="mainmenu-area">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div> 
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a href="../Accueil-Chef/<?php echo $_SESSION['id_s']; ?>">Accueil</a></li>
                            <li><a href="../Formations-Chef/<?php echo $_SESSION['id_s']; ?>">Liste des formations</a></li>
                            <li><a href="../Liste-Salariés/<?php echo $_SESSION['id_s']; ?>">Liste des salariés</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Formation <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../Historique-Chef/<?php echo $_SESSION['id_s']; ?>">historique des formations</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div><!-- End mainmenu area -->

        <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Mon Compte</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Page title area -->

        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="titre_profil">Nom :</h3>
                            <h4><?php echo $_SESSION['nom']; ?></h4>
                        </div>
                    </div><br /><br />
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="titre_profil">Prénom :</h3>
                            <h4><?php echo $_SESSION['prenom']; ?></h4>
                        </div>
                    </div><br /><br />
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="titre_profil">Mail :</h3>
                            <h4><?php echo $_SESSION['email']; ?></h4>
                        </div>
                    </div><br /><br />
                    <form method="post" action="../controllers/modifMdp.php">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="titre_profil">Mot de passe :</h3>
                                <input name="ancienMdp" type="password" placeholder="Ancien mot de passe"/><br /><br />
                                <input name="mdp" type="password" placeholder="Nouveau mot de passe"/><br /><br />
                                <input name="mdp2" type="password" placeholder="Retapez votre nouveau mot de passe"/>
                            </div>
                        </div><br />
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="validFormMdp" value="Modifier le mot de passe"/>
                            </div>
                        </div>
                    </form>
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="titre_profil">Identifiant :</h3>
                            <h4><?php echo $_SESSION['identifiant']; ?></h4>
                        </div>
                    </div>
                    <br />
                    <br />
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="titre_profil">Nombre de crédits (En nombre de jours) :</h3>
                            <h4><?php echo $_SESSION['nbs_jour']; ?></h4>
                        </div>
                    </div>
                    <br />
                    <br />
                </div>
            </div>
        </div>


        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright">
                            <p>&copy; Créer par <a href="#" target="_blank">Paul Goncalves</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer bottom area -->

        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>

        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- jQuery sticky menu -->
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/jquery.sticky.js"></script>

        <!-- jQuery easing -->
        <script src="../js/jquery.easing.1.3.min.js"></script>

        <!-- Main Script -->
        <script src="../js/main.js"></script>
    </body>
</html>

<!-- Dropdown hover -->
<script src="../js/dropdownHover.js"></script>

<?php
                                                                        } else {
        $message="Vous devez vous connecter";
        echo $message.'<br />';
        echo '<a href="../Connexion">Page de connexion</a>';
    }
} else {
    $message="Vous devez vous connecter";
    echo $message.'<br />';
    echo '<a href="../Connexion">Page de connexion</a>';
}
?>