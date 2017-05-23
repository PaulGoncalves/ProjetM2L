<?php
include('../model/connexionBdd.php');
session_start();

if(isset($_GET['id_s']) AND $_GET['id_s'] > 0)
{
    $getid = intval($_GET['id_s']);
    $requser = $bdd->prepare('SELECT * FROM salarie WHERE id_s = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

    if(isset($_SESSION['id_s']) AND $_GET['id_s']) {

        include('../core/stat.class.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon.png" />
        <link rel="icon" type="image/png" href="../img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Ajout formations - Admin</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!--  Material Dashboard CSS    -->
        <link href="../css/material-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    </head>

    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="../img/sidebar-1.jpg">
                <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"
Tip 2: you can also add an image using data-image tag

-->

                <div class="logo">
                    <a href="../Accueil-Admin/<?php echo $_SESSION['id_s']; ?>" class="simple-text">Espace Administrateur</a>
                </div>


                <div class="sidebar-wrapper">
                    <ul class="nav">
                        <li>
                            <a href="../Accueil-Admin/<?php echo $_SESSION['id_s']; ?>">
                                <i class="material-icons">dashboard</i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li>
                            <a href="../Ajout-Utilisateur/<?php echo $_SESSION['id_s']; ?>">
                                <i class="material-icons">person</i>
                                <p>Ajout d'utilisateur</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="../Ajout-Formation/<?php echo $_SESSION['id_s']; ?>">
                                <i class="material-icons">content_paste</i>
                                <p>Ajout de formations</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-transparent navbar-absolute">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="../Ajout-Formation/<?php echo $_SESSION['id_s']; ?>">Ajout de formations</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">dashboard</i>
                                        <p class="hidden-lg hidden-md">Dashboard</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../Accueil-Admin/<?php echo $_SESSION['id_s']; ?>">Retour au dasboard</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">person</i>
                                        <p class="hidden-lg hidden-md">Profile</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="../controllers/deconnexion.php">Déconnexion</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <form class="navbar-form navbar-right" role="search">
                                <div class="form-group  is-empty">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="material-input"></span>
                                </div>
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i><div class="ripple-container"></div>
                                </button>
                            </form>
                        </div>
                    </div>
                </nav>

                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header" data-background-color="purple">
                                        <h4 class="title">Ajout d'une formation</h4>
                                        <p class="category">Compléter le formulaire</p><?php if(isset($_GET['message'])) {echo $_GET['message']; } ?>
                                    </div>
                                    <div class="card-content">
                                        <form method="POST" action="../controllers/adminInsertElement.php">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Titre</label>
                                                        <input type="text" class="form-control" name="titre">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Coût (Nbs jours)</label>
                                                        <input type="number" class="form-control" name="cout_jours">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Date</label>
                                                        <input type="date" class="form-control date_input" name="date_debut">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nombre de places</label>
                                                        <input type="number" class="form-control" name="nb_place">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label">Contenu</label>
                                                            <textarea name="contenu" class="form-control" rows="5"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="panel with-nav-tabs panel-default">
                                                    <div class="panel-heading">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1default" data-toggle="tab">Prestaire déjà existant</a></li>
                                                            <li><a href="#tab2default" data-toggle="tab">Nouveau prestataire</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1default">
                                                                <label>Choix du prestataire :</label>
                                                                <select class="Select" name="adresse_complete">
                                                                    <?php include('../controllers/affichagePrestataireAdmin.php'); ?> <!-- A MODIFIER -->
                                                                </select>
                                                                <br />
                                                                <br />
                                                                <input type="submit" Value="Ajouter la formation" class="btn btn-primary pull-right" name="validFormAdresseExist"/>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab2default">
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Nom du prestataire</label>
                                                                        <input type="text" class="form-control" name="nom" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Adresse mail</label>
                                                                        <input type="email" class="form-control" name="mail" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Téléphone</label>
                                                                        <input type="text" class="form-control" name="tel" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Numéro</label>
                                                                        <input type="number" class="form-control" name="numero" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Rue</label>
                                                                        <input type="text" class="form-control" name="rue" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Code postal</label>
                                                                        <input type="number" class="form-control" name="codePostal" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group label-floating">
                                                                        <label class="control-label">Ville</label>
                                                                        <input type="text" class="form-control" name="ville" />
                                                                    </div>
                                                                </div>
                                                                <br />
                                                                <br />
                                                                <input type="submit" Value="Ajouter la formation" class="btn btn-primary pull-right" name="validFormPrestataireNew"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="green">
                                        <i class="material-icons" style="font-size:52px;">view_list</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Nombre de formations</p>
                                        <h3 class="title"><?php echo statistiques::calculNb("formation"); ?> formations</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">update</i> Just Updated
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="card card-stats">
                                    <div class="card-header" data-background-color="blue">
                                        <i class="material-icons" style="font-size:52px;">format_list_bulleted</i>
                                    </div>
                                    <div class="card-content">
                                        <p class="category">Nombre d'inscription aux formations</p>
                                        <h3 class="title"><?php echo Statistiques::nbInscription() ?> inscriptions</h3>
                                    </div>
                                    <div class="card-footer">
                                        <div class="stats">
                                            <i class="material-icons">library_add</i> <a href="../Inscription-Aux-Formations/<?php echo $_SESSION['id_s']; ?>">Afficher les formations</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="dashboard.php">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a target="_blank" href="http://paulgoncalves-portfolio.esy.es/">
                                        Portfolio
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </footer>
            </div>
        </div>

    </body>

    <!--   Core JS Files   -->
    <script src="../js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../js/material.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="../js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="../js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../js/demo.js"></script>

</html>


<?php
    } else {
        $message="Vous devez vous connecter";
        echo $message.'<br />';
        echo '<a href="../view/login.php">Page de connexion</a>';
    }
} else {
    $message="Vous devez vous connecter";
    echo $message.'<br />';
    echo '<a href="../view/login.php">Page de connexion</a>';
}
?>