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
        <title>Formation de <?php echo $_SESSION['identifiant'] ?></title>

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
                            <li class="active"><a href="../Formations-Chef/<?php echo $_SESSION['id_s']; ?>">Liste des formations</a></li>
                            <li><a href="../Liste-Salariés/<?php echo $_SESSION['id_s']; ?>">Liste des salariés</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Formation <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../Historique-Chef/<?php echo $_SESSION['id_s']; ?>">historique des formations</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <div class="search">
                                    <form method="POST">
                                        <input type="text" class="form-control input-sm" maxlength="64" placeholder="Rechercher" name="search"/>
                                        <button type="submit" class="btn btn-primary btn-sm" name="validRecherche"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
                                    </form>
                                </div>
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
                            <h2>Liste des formations</h2>
                            <?php if(isset($_GET['message'])) { echo '<b class="font-18px">'.$_GET['message'].'</b>'; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Page title area -->

        <br />

        <div class="container">
            <table class="col-xs-12 col-md-12 table table-striped">
                <tr>
                    <th>Titre</th>
                    <th>Coût (Nb jour)</th>
                    <th>Date</th>
                    <th>Nombre Paces</th>
                    <th>Contenu</th>
                    <th>Détails</th>
                    <th>Ajouter</th>
                </tr>
                <?php include('../model/afficheFormationAdmin.php'); ?>
            </table>


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