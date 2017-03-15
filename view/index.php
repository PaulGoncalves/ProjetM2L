<?php
include('../model/connexionBdd.php');
session_start();


if(isset($_GET['id_s']) AND $_GET['id_s'] > 0)
{
    $getid = intval($_GET['id_s']);
    $requser = $bdd->prepare('SELECT * FROM salarie WHERE id_s = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    if(isset($_SESSION['id_s']) AND $_GET['id_s'] == $_SESSION['id_s']) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Accueil</title>

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
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li><a href="Profil?id_s=<?php echo $_SESSION['id_s']; ?>"><i class="fa fa-user"></i> Mon Compte</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                    <a href="../controllers/deconnexion.php"><i class="fa fa-sign-out"></i> Déconnexion</a>
                                </li>
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
                            <h1><a href="Accueil?id_s=<?php echo $_SESSION['id_s']; ?>">Form<span>ation</span></a></h1>
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
                            <li class="active"><a href="Accueil?id_s=<?php echo $_SESSION['id_s']; ?>">Accueil</a></li>
                            <li><a href="Formations?id_s=<?php echo $_SESSION['id_s']; ?>">Liste des formations</a></li>
                            <li><a href="Contact?id_s=<?php echo $_SESSION['id_s']; ?>">Contact</a></li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div> <!-- End mainmenu area -->

        <div class="product-big-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-bit-title text-center">
                            <h2>Accueil</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Page title area -->

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <br />
                    <h3>Historique des formations</h3>
                    <div class="col-md-3 col-xs-6">
                        <p align="center"> <i class="fa fa-circle rouge" aria-hidden="true"></i> Refusée</p>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <p align="center"> <i class="fa fa-circle orange" aria-hidden="true"></i> En attente</p>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <p align="center"> <i class="fa fa-circle vert" aria-hidden="true"></i> Validée</p>
                    </div>
                    <div class="col-md-3 col-xs-6">
                        <p align="center"> <i class="fa fa-circle bleu" aria-hidden="true"></i> Effectuée</p>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Titre de la formation</th>
                            <th>Date début</th>
                            <th>Etat</th>
                        </tr>
                        <?php 

                                                                         $req = $bdd->query('SELECT formation.cout_jours, formation.date_debut, formation.id_f, type_formation.type FROM formation INNER JOIN type_formation ON formation.id_f = type_formation.id_f WHERE type = "Validée" ');
                                                                         while($donnee = $req->fetch()) {


                                                                             $date_actuelle = date('d-m-Y');

                                                                             $ajout_date  = $donnee['cout_jours'];

                                                                             $date_formation = $donnee['date_debut'];
                                                                             $date_plus_jours = date('d-m-Y', strtotime($date_formation.' + '.$ajout_date.' days'));


                                                                             if($donnee['type'] == 'Validée') {

                                                                                 if($date_plus_jours < $date_actuelle ) {

                                                                                     $type = 'Effectuée';

                                                                                     $reqUpdate = $bdd->prepare('UPDATE type_formation SET type = :type WHERE type = "Validée" ');
                                                                                     $reqUpdate->execute(array('type' => $type));


                                                                                 }

                                                                             }
                                                                         }

                        ?>
                        <?php include('../model/affichHistorique.php'); ?>
                    </table>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
                    <p><br /></p>
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
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>

        <!-- jQuery easing -->
        <script src="js/jquery.easing.1.3.min.js"></script>

        <!-- Main Script -->
        <script src="js/main.js"></script>
        <?php
                                                                        } else {
        $message="Vous devez vous connecter";
        echo $message.'<br />';
        echo '<a href="../view/Login">Page de connexion</a>';
    }
} else {
    $message="Vous devez vous connecter";
    echo $message.'<br />';
    echo '<a href="../view/Login">Page de connexion</a>';
}
        ?>
    </body>
</html>