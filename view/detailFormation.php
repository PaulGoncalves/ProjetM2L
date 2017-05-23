<?php
include('../model/connexionBdd.php');
session_start();

include('../model/infoSalarie.php');


$reqaffiche = $bdd->query('SELECT formation.titre, formation.cout_jours, formation.date_debut, formation.nb_place, formation.contenu, formation.id_a, adresse.rue, adresse.numero_rue, adresse.code_postal, adresse.ville, prestataire.raison_social, prestataire.telephone, prestataire.mail FROM formation INNER JOIN adresse ON formation.id_a = adresse.id_a INNER JOIN prestataire ON formation.id_p = prestataire.id_p WHERE id_f = '.$_GET['id_f']);
$donneesFormation = $reqaffiche->fetch();


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
        <title>Liste des formations</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="../../css/owl.carousel.css">
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/responsive.css">

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
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li><a href="../Profil/<?php echo $_SESSION['id_s']; ?>"><i class="fa fa-user"></i> Mon Compte</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="header-right">
                            <ul class="list-unstyled list-inline">
                                <li class="dropdown dropdown-small">
                                <li><a href="../../controllers/deconnexion.php"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
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
                            <h1><a href="../Accueil/<?php echo $_SESSION['id_s']; ?>">Form<span>ation</span></a></h1>
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
                            <li><a href="../Accueil/<?php echo $_SESSION['id_s']; ?>">Accueil</a></li>
                            <li class="active"><a href="../Formations/<?php echo $_SESSION['id_s']; ?>">Liste des formations</a></li>
                            <li><a href="../Contact/<?php echo $_SESSION['id_s']; ?>">Contact</a></li>
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
                            <h2>Detail de la <?php echo $donneesFormation['titre']; ?></h2>

                            <?php if(isset($_GET['message'])) { echo '<b class="font-18px">'.$_GET['message'].'</b>'; } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="single-product-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 detail_complet">
                        <br />
                        <div class="col-md-3">
                            <a href="../../Formations/<?php echo $_SESSION['id_s'] ?>"><input type="submit" value="Retour à la liste des formations"/></a>
                        </div>
                        <div class="col-md-12">
                            <br />
                        </div>
                        <div class="col-md-12 entete_detail_formation">
                            <h2><?php echo $donneesFormation['titre']; ?></h2>
                        </div>
                        <div class="col-md-12"><br /><br /></div>
                        <div class="col-md-12">
                            <h3>Coût de la formation : <span class="font-19px"><?php echo $donneesFormation['cout_jours']; ?> (En nombres de jours)</span></h3>
                            <br />
                        </div>
                        <div class="col-md-12">
                            <h3>Date de début de la formation : <span class="font-19px"><?php echo date('d/m/Y', strtotime($donneesFormation['date_debut'])); ?></span>
                            </h3>
                            <br />
                        </div>
                        <div class="col-md-12">
                            <?php $date_plus_jours = date('d-m-Y', strtotime($donneesFormation['date_debut'].' + '.$donneesFormation['cout_jours'].' days'));
                            ?>
                            <h3>Date de fin de la formation : <span class="font-19px"><?php echo $date_plus_jours; ?></span>
                            </h3>
                            <br />
                        </div>
                        <div class="col-md-12">
                            <h3>Nombre de place restante pour cette formation : <span class="font-19px"><?php echo $donneesFormation['nb_place']; ?></span></h3>
                            <br />
                        </div>
                        <div class="col-md-12">
                            <h3>Description de la formation : <span class="font-19px"><?php echo $donneesFormation['contenu']; ?></span></h3>
                            <br />
                        </div>
                        <div class="col-md-12">
                            <h3>Adresse : <br /></h3><h4><span class="font-19px"><?php echo $donneesFormation['numero_rue'].' '.$donneesFormation['rue']; ?></span></h4>
                            <h4><span class="font-19px"><?php echo $donneesFormation['code_postal'].', '.$donneesFormation['ville'] ?></span></h4>
                            <br />
                        </div>
                        <div class="col-md-12">
                            <h3>Dispensée par : <br /></h3><h4><span class="font-19px"><?php echo $donneesFormation['raison_social'] ?></span></h4>
                            <h4><span class="font-19px">Tel : <?php echo $donneesFormation['telephone']?></span></h4>
                            <h4><span class="font-19px">Mail : <?php echo $donneesFormation['mail']?></span></h4>
                            <br />
                        </div>
                    </div>
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